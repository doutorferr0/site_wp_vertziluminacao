<?php
/**
 * inc/carbon-fields.php — Vertz Iluminação
 * Registro de todos os campos usando Carbon Fields (100% gratuito).
 * Requer: composer require htmlburger/carbon-fields
 *
 * Leitura nos templates:
 *   - Opções globais : carbon_get_theme_option('crb_contato_whatsapp')
 *   - Meta de página : carbon_get_post_meta(get_the_ID(), 'crb_hero_video')
 *   - Repeater       : carbon_get_post_meta(get_the_ID(), 'crb_faq_items') → array
 *
 * O helper vf() em functions.php abstrai tudo isso.
 */

use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;

add_action('carbon_fields_register_fields', function() {

    /* ════════════════════════════════════════════════════════
       OPÇÕES GLOBAIS — ⚡ Vertz Config
       Aparece em: WP Admin → ⚡ Vertz Config
    ════════════════════════════════════════════════════════ */
    Container::make('theme_options', '⚡ Vertz Config')
        ->set_icon('dashicons-lightbulb')
        ->set_page_menu_position(3)
        ->add_tab('📞 Contato & Endereços', array(
            Field::make('text', 'crb_contato_whatsapp', 'WhatsApp (só números)')
                ->set_default_value('5519999778710')
                ->set_help_text('Usado em todos os links de WhatsApp do site. Apenas números, com código do país. Ex: 5519999778710'),

            Field::make('text', 'crb_contato_telefone', 'Telefone fixo')
                ->set_default_value('(19) 3251-0501'),

            Field::make('text', 'crb_contato_email', 'E-mail')
                ->set_default_value('contato@vertziluminacao.com.br'),

            Field::make('text', 'crb_contato_instagram', 'Instagram (sem @)')
                ->set_default_value('vertziluminacao'),

            Field::make('text', 'crb_contato_endereco_campinas', 'Endereço Campinas')
                ->set_default_value('R. Antônio Lapa, 328 — Cambuí'),

            Field::make('text', 'crb_contato_endereco_sp', 'Endereço São Paulo')
                ->set_default_value('Alameda Casa Branca, 806 — Jardim Paulista'),

            Field::make('text', 'crb_contato_horario', 'Horário de atendimento')
                ->set_default_value('Seg–Sex 9h–18h / Sáb 9h–13h'),
        ));


    /* ════════════════════════════════════════════════════════
       HOME — front-page.php
       Aparece ao editar a página definida como "Página Inicial"
       em Configurações → Leitura
    ════════════════════════════════════════════════════════ */
    $front_id = intval(get_option('page_on_front'));
    $home_where = $front_id > 0
        ? array('post_id', '=', $front_id)
        : array('post_template', '=', 'front-page.php');

    Container::make('post_meta', 'Home — Conteúdo')
        ->where($home_where[0], $home_where[1], $home_where[2])
        ->add_tab('🎬 Hero', array(
            Field::make('file', 'crb_hero_video', 'Vídeo hero (MP4)')
                ->set_type(array('video'))
                ->set_value_type('url')
                ->set_help_text('Formato MP4. Recomendado: 1920×1080, máx. 15MB. Comprima em handbrake antes de subir.'),

            Field::make('image', 'crb_hero_poster', 'Poster do vídeo')
                ->set_value_type('url')
                ->set_help_text('Frame inicial do vídeo. Evita flash em branco ao carregar.'),
        ))
        ->add_tab('📝 Seção 2 — Chamada', array(
            Field::make('text', 'crb_home_s2_sub', 'Eyebrow (texto pequeno)')
                ->set_default_value('O que fazemos'),

            Field::make('text', 'crb_home_s2_titulo', 'Título')
                ->set_default_value('Iluminação técnica e decorativa para ambientes únicos.'),

            Field::make('textarea', 'crb_home_s2_corpo', 'Parágrafo')
                ->set_rows(3)
                ->set_default_value('A Vertz combina projeto luminotécnico rigoroso com curadoria estética de marcas exclusivas — transformando cada ambiente em uma experiência precisa e memorável.'),
        ))
        ->add_tab('🖼️ Galeria', array(
            Field::make('image', 'crb_gallery_01', 'Foto Residencial')
                ->set_value_type('url'),
            Field::make('image', 'crb_gallery_02', 'Foto Comercial')
                ->set_value_type('url'),
            Field::make('image', 'crb_gallery_03', 'Foto Paisagismo')
                ->set_value_type('url'),
        ))
        ->add_tab('⭐ Diferenciais', array(
            Field::make('image', 'crb_features_img', 'Imagem lateral')
                ->set_value_type('url'),

            Field::make('complex', 'crb_features_items', 'Diferenciais')
                ->set_layout('tabbed-horizontal')
                ->set_min(1)->set_max(5)
                ->add_fields(array(
                    Field::make('text',     'titulo', 'Título'),
                    Field::make('textarea', 'texto',  'Texto')->set_rows(2),
                )),
        ))
        ->add_tab('❓ FAQs', array(
            Field::make('complex', 'crb_faq_items', 'Perguntas Frequentes')
                ->set_layout('tabbed-vertical')
                ->set_min(1)->set_max(10)
                ->add_fields(array(
                    Field::make('text',     'pergunta', 'Pergunta'),
                    Field::make('textarea', 'resposta', 'Resposta')->set_rows(3),
                )),
        ))
        ->add_tab('🏆 10 Razões', array(
            Field::make('complex', 'crb_razoes_items', '10 Razões para escolher a Vertz')
                ->set_layout('tabbed-vertical')
                ->set_min(1)->set_max(10)
                ->add_fields(array(
                    Field::make('text',     'titulo', 'Título'),
                    Field::make('text',     'acento', 'Frase em destaque (negrito)'),
                    Field::make('textarea', 'texto',  'Texto complementar')->set_rows(2),
                )),
        ))
        ->add_tab('📞 CTA Final', array(
            Field::make('image', 'crb_cta_foto', 'Foto showroom')
                ->set_value_type('url'),

            Field::make('text', 'crb_cta_titulo', 'Título')
                ->set_default_value('Vamos iluminar o seu projeto.'),

            Field::make('textarea', 'crb_cta_corpo', 'Texto')
                ->set_rows(2)
                ->set_default_value('Envie a planta baixa, o projeto do arquiteto ou apenas descreva o espaço. Nossa equipe retorna em até 24 horas úteis com uma proposta preliminar.'),
        ));


    /* ════════════════════════════════════════════════════════
       SOBRE — page-sobre.php
    ════════════════════════════════════════════════════════ */
    Container::make('post_meta', 'Sobre — Conteúdo')
        ->where('post_template', '=', 'page-sobre.php')
        ->add_tab('🎬 Hero', array(
            Field::make('image', 'crb_sobre_hero_img', 'Imagem hero (1920×1080)')
                ->set_value_type('url'),
        ))
        ->add_tab('📝 Manifesto', array(
            Field::make('text', 'crb_sobre_manifesto_sub', 'Eyebrow')
                ->set_default_value('Nossa história'),

            Field::make('text', 'crb_sobre_manifesto_titulo', 'Título')
                ->set_default_value('Mais de 20 anos iluminando projetos com precisão e elegância.'),

            Field::make('rich_text', 'crb_sobre_manifesto_corpo', 'Texto (HTML)')
                ->set_help_text('Use negrito e itálico livremente. Parágrafo por parágrafo.'),

            Field::make('image', 'crb_sobre_missao_img', 'Imagem missão (3:2 inset)')
                ->set_value_type('url'),
        ))
        ->add_tab('📊 Números', array(
            Field::make('complex', 'crb_sobre_stats', 'Estatísticas')
                ->set_layout('tabbed-horizontal')
                ->set_min(1)->set_max(6)
                ->add_fields(array(
                    Field::make('text', 'numero', 'Número (ex: +20)'),
                    Field::make('text', 'sufixo', 'Sufixo (ex: %)'),
                    Field::make('text', 'legenda', 'Legenda'),
                )),
        ))
        ->add_tab('🖼️ Galeria', array(
            Field::make('image', 'crb_sobre_galeria_01', 'Foto 1 — Residencial')
                ->set_value_type('url'),
            Field::make('image', 'crb_sobre_galeria_02', 'Foto 2 — Comercial')
                ->set_value_type('url'),
            Field::make('image', 'crb_sobre_galeria_03', 'Foto 3 — Corporativo')
                ->set_value_type('url'),
        ));


    /* ════════════════════════════════════════════════════════
       SERVIÇOS — page-servicos.php
    ════════════════════════════════════════════════════════ */
    Container::make('post_meta', 'Serviços — Conteúdo')
        ->where('post_template', '=', 'page-servicos.php')
        ->add_tab('🎬 Hero', array(
            Field::make('image', 'crb_servicos_hero_img', 'Imagem hero (1920×1080)')
                ->set_value_type('url'),
        ))
        ->add_tab('📝 Declaração', array(
            Field::make('textarea', 'crb_servicos_decl_titulo', 'Headline')
                ->set_rows(3)
                ->set_default_value("A maioria das lojas vende luminárias.\nNós projetamos o ambiente que você vai habitar."),

            Field::make('textarea', 'crb_servicos_decl_corpo', 'Parágrafo')
                ->set_rows(3)
                ->set_default_value('Cada espaço tem uma função. Cada função exige uma luz específica. Combinamos projeto técnico rigoroso com curadoria estética de marcas exclusivas — para entregar ambientes que funcionam, impressionam e duram.'),
        ))
        ->add_tab('🃏 Segmentos', array(
            Field::make('complex', 'crb_servicos_segmentos', 'Cards de segmentos')
                ->set_layout('tabbed-vertical')
                ->set_min(1)->set_max(9)
                ->add_fields(array(
                    Field::make('text',     'titulo',  'Título'),
                    Field::make('textarea', 'desc',    'Descrição')->set_rows(3),
                    Field::make('image',    'imagem',  'Imagem (4:3)')->set_value_type('url'),
                    Field::make('textarea', 'itens',   'Itens da lista (um por linha)')->set_rows(4),
                )),
        ));


    /* ════════════════════════════════════════════════════════
       CONTATO — page-contato.php
    ════════════════════════════════════════════════════════ */
    Container::make('post_meta', 'Contato — Conteúdo')
        ->where('post_template', '=', 'page-contato.php')
        ->add_fields(array(
            Field::make('text', 'crb_contato_titulo', 'Título da página')
                ->set_default_value('Vamos conversar.'),

            Field::make('image', 'crb_contato_banner', 'Imagem de fechamento (21:9)')
                ->set_value_type('url')
                ->set_help_text('Banner wide no rodapé da página de contato.'),
        ));


    /* ════════════════════════════════════════════════════════
       PROJETO — CPT (single-projeto.php)
       Campos de cada projeto no portfólio
    ════════════════════════════════════════════════════════ */
    Container::make('post_meta', 'Projeto — Conteúdo')
        ->where('post_type', '=', 'projeto')
        ->add_tab('🖼️ Imagens', array(
            Field::make('image', 'crb_projeto_cover', 'Capa / Hero (16:9 ou 3:2)')
                ->set_value_type('url')
                ->set_help_text('Imagem principal. Usada no hero do single e no card da listagem.'),

            Field::make('complex', 'crb_projeto_galeria', 'Galeria de Imagens')
                ->set_layout('tabbed-horizontal')
                ->set_min(1)->set_max(20)
                ->add_fields(array(
                    Field::make('image', 'imagem', 'Foto')->set_value_type('url'),
                    Field::make('text',  'legenda', 'Legenda (opcional)'),
                )),
        ))
        ->add_tab('📋 Dados do Projeto', array(
            Field::make('text', 'crb_projeto_papel', 'Função (ex: Projeto Luminotécnico)')
                ->set_help_text('Exibido na coluna Função da listagem de projetos.'),

            Field::make('text', 'crb_projeto_parceria', 'Parceria (ex: Arquitetos JM)')
                ->set_help_text('Escritório ou parceiro envolvido no projeto.'),

            Field::make('text', 'crb_projeto_localizacao', 'Local (ex: Campinas, SP)')
                ->set_default_value('Campinas, SP'),

            Field::make('text', 'crb_projeto_ano', 'Ano de conclusão (ex: 2024)'),
        ))
        ->add_tab('📝 Descrição', array(
            Field::make('rich_text', 'crb_projeto_descricao', 'Descrição do Projeto')
                ->set_help_text('Texto completo exibido na página do projeto. Use parágrafos e negrito.'),
        ));

}); // fim carbon_fields_register_fields

