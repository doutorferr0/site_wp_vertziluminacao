<?php
/**
 * inc/meta-projeto.php — Vertz Iluminação
 * Meta boxes para CPT projeto
 * Campos: localizacao, tipo_servico, area, galeria
 */

add_action( 'add_meta_boxes', function() {
    add_meta_box(
        'vertz_projeto_meta',
        'Detalhes do Projeto',
        'vertz_projeto_meta_cb',
        'projeto',
        'normal',
        'high'
    );
} );

function vertz_projeto_meta_cb( $post ) {
    wp_nonce_field( 'vertz_projeto_meta', 'vertz_projeto_nonce' );
    $loc     = get_post_meta( $post->ID, '_projeto_localizacao', true );
    $desc    = get_post_meta( $post->ID, '_projeto_descricao', true );
    $servicos = get_post_meta( $post->ID, '_projeto_servicos', true );
    $tipo    = get_post_meta( $post->ID, '_projeto_tipo_servico', true );
    $area    = get_post_meta( $post->ID, '_projeto_area', true );
    $galeria = get_post_meta( $post->ID, '_projeto_galeria', true );
    ?>
    <table class="form-table">
        <tr>
            <th><label for="projeto_localizacao">Localização</label></th>
            <td><input type="text" id="projeto_localizacao" name="projeto_localizacao"
                 value="<?php echo esc_attr( $loc ); ?>" class="regular-text"
                 placeholder="Ex: Campinas, SP"></td>
        </tr>
        <tr>
            <th><label for="projeto_tipo_servico">Tipo de Serviço</label></th>
            <td>
                <select id="projeto_tipo_servico" name="projeto_tipo_servico">
                    <option value="">— Selecione —</option>
                    <?php foreach ( ['Projeto Técnico', 'Projeto Decorativo', 'Projeto Completo', 'Consultoria'] as $opt ): ?>
                    <option value="<?php echo $opt; ?>" <?php selected( $tipo, $opt ); ?>><?php echo $opt; ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="projeto_area">Área (m²)</label></th>
            <td><input type="text" id="projeto_area" name="projeto_area"
                 value="<?php echo esc_attr( $area ); ?>" class="small-text"
                 placeholder="Ex: 320"></td>
        </tr>
        <tr>
            <th><label for="projeto_descricao">Descrição</label></th>
            <td><textarea id="projeto_descricao" name="projeto_descricao" rows="4" class="large-text"><?php echo esc_textarea( $desc ); ?></textarea></td>
        </tr>
        <tr>
            <th><label for="projeto_servicos">Serviços (um por linha)</label></th>
            <td><textarea id="projeto_servicos" name="projeto_servicos" rows="4" class="large-text" placeholder="Projeto Luminotécnico&#10;Memorial Descritivo&#10;Especificação de Produtos"><?php echo esc_textarea( $servicos ); ?></textarea></td>
        </tr>
        <tr>
            <th><label>Galeria de Imagens</label></th>
            <td>
                <div id="vertz-galeria-preview" style="display:flex;gap:8px;flex-wrap:wrap;margin-bottom:8px;">
                    <?php if ( $galeria ):
                        foreach ( explode(',', $galeria) as $id ):
                            $url = wp_get_attachment_image_url( (int)$id, 'thumbnail' );
                            if ( $url ) echo '<img src="' . esc_url($url) . '" style="height:60px;border-radius:4px;">';
                        endforeach;
                    endif; ?>
                </div>
                <input type="hidden" id="vertz_galeria" name="projeto_galeria"
                       value="<?php echo esc_attr( $galeria ); ?>">
                <button type="button" class="button" id="vertz-galeria-btn">Selecionar Imagens</button>
                <p class="description">IDs separados por vírgula. Clique para abrir a galeria do WP.</p>
            </td>
        </tr>
    </table>
    <script>
    jQuery(function($){
        var frame;
        $('#vertz-galeria-btn').on('click', function(){
            if (frame) { frame.open(); return; }
            frame = wp.media({ title: 'Selecionar Imagens da Galeria', button: { text: 'Usar imagens' }, multiple: true });
            frame.on('select', function(){
                var ids = frame.state().get('selection').map(function(a){ return a.id; });
                $('#vertz_galeria').val(ids.join(','));
                var html = '';
                frame.state().get('selection').each(function(a){
                    html += '<img src="'+a.attributes.sizes.thumbnail.url+'" style="height:60px;border-radius:4px;">';
                });
                $('#vertz-galeria-preview').html(html);
            });
            frame.open();
        });
    });
    </script>
    <?php
}

add_action( 'save_post_projeto', function( $post_id ) {
    if ( ! isset( $_POST['vertz_projeto_nonce'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['vertz_projeto_nonce'], 'vertz_projeto_meta' ) ) return;
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;

    $fields = [
        'projeto_localizacao'  => '_projeto_localizacao',
        'projeto_tipo_servico' => '_projeto_tipo_servico',
        'projeto_area'         => '_projeto_area',
        'projeto_galeria'      => '_projeto_galeria',
        'projeto_descricao'    => '_projeto_descricao',
        'projeto_servicos'     => '_projeto_servicos',
    ];
    $textareas = ['projeto_descricao', 'projeto_servicos'];
    foreach ( $fields as $post_key => $meta_key ) {
        if ( isset( $_POST[$post_key] ) ) {
            $val = in_array($post_key, $textareas)
                ? sanitize_textarea_field( $_POST[$post_key] )
                : sanitize_text_field( $_POST[$post_key] );
            update_post_meta( $post_id, $meta_key, $val );
        }
    }
} );
