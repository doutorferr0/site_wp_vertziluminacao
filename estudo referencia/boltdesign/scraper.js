const puppeteer = require('puppeteer');
const fs = require('fs');

async function saveRenderedHtml(page, url, filename) {
    await page.goto(url, { waitUntil: 'networkidle0' });
    const html = await page.content();
    fs.writeFileSync(filename, html, 'utf-8');
    console.log(`Saved: ${filename}`);
}

(async () => {
    const browser = await puppeteer.launch({
        headless: 'new',
        args: ['--no-sandbox', '--disable-setuid-sandbox']
    });

    const page = await browser.newPage();
    await page.setRequestInterception(true);

    page.on('request', (req) => {
        const resourceType = req.resourceType();
        if (['image', 'media', 'font'].includes(resourceType)) {
            req.abort();
        } else {
            req.continue();
        }
    });

    const baseUrl = 'https://www.boltdesign.nyc';
    const projectsUrl = `${baseUrl}/projects`;

    await saveRenderedHtml(page, projectsUrl, 'projects_renderizado.html');

    const projectLinks = await page.$$eval('a[href]', anchors => {
        return anchors
            .map(a => a.getAttribute('href'))
            .filter(href => href && href.startsWith('/projects/') && href !== '/projects')
            .map(href => href.split('?')[0])
            .filter((value, index, self) => self.indexOf(value) === index);
    });

    if (projectLinks.length === 0) {
        console.warn('Nenhum link de projeto encontrado na página /projects. Verifique o seletor ou a estrutura da página.');
    } else {
        console.log(`Encontrados ${projectLinks.length} links de projeto.`);
        for (const href of projectLinks) {
            const projectUrl = `${baseUrl}${href}`;
            const cleanName = href.replace(/\//g, '_').replace(/^_/, '').replace(/[^a-zA-Z0-9_.-]/g, '');
            const filename = `project_${cleanName}.html`;
            await saveRenderedHtml(page, projectUrl, filename);
        }
    }

    await browser.close();
})();