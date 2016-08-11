<?php

class qmCPT{
  
  public $meta_boxes = array();
  public $meta_fields = array();
  public $custom_columns = array();
  public $sortable_columns = array();
  public $custom_columns_show = array();

  public function addMetaBoxes($id, $title, $order = 100){
    $this->meta_boxes[] = array('id' => $id, 'title' => $title, 'order' => $order);
  }

  public function addField($id, $label, $meta_box, $type, $options = array()){
    if(!isset($this->meta_fields[$meta_box])) $this->meta_fields[$meta_box] = array();
    $this->meta_fields[$meta_box][] = array('id' => $id, 'label' => $label, 'type' => $type, 'options' => $options);
  }

  public function addCustomColumn($id, $label, $sort, $type = false){
    $this->custom_columns[$id] = __($label);
    if($sort){
      $this->sortable_columns[$id] = $id;
    }
    if ($type) {
      $this->custom_columns_show[] = array('id' => $id, 'type' => $type);
    }
  }

  /**
   * Register the meta boxes
   */
  public function meta_box_cb(){
    foreach($this->meta_boxes as $mb){
      if(isset($this->meta_fields[$mb['id']])){
        add_meta_box($mb['id'], $mb['title'], array($this, 'meta_box_html'), $this->cpt_name, 'normal', 'default');
      }
    }
  }

  /**
   * Return the meta box html
   * @param object $post Current post
   */
  public function meta_box_html($post, $args){
    wp_nonce_field( plugin_basename( __FILE__ ), $this->cpt_name );
    ?>
    <table class="ay-cpt-table">
    <?php foreach($this->meta_fields[$args['id']] as $field) : ?>
      <tr>
        <td class="label">
          <label for="<?php echo $field['id']; ?>"><?php echo $field['label']; ?></label>
        </td>
        <td>
          <?php if($field['type'] == 'text') : ?>
            <input type="text" id="<?php echo $field['id']; ?>" name="<?php echo $field['id']; ?>" value="<?php echo get_post_meta($post->ID, $field['id'], true); ?>">
          <?php elseif($field['type'] == 'date') : ?>
            <input type="text" class="datepicker" id="<?php echo $field['id']; ?>" name="<?php echo $field['id']; ?>" value="<?php echo get_post_meta($post->ID, $field['id'], true); ?>">
          <?php elseif($field['type'] == 'time') : ?>
            <input type="time" id="<?php echo $field['id']; ?>" name="<?php echo $field['id']; ?>" value="<?php echo get_post_meta($post->ID, $field['id'], true); ?>">
          <?php elseif($field['type'] == 'file') : ?>
            <input type="hidden" value="<?php echo get_post_meta($post->ID, $field['id'], true); ?>" id="<?php echo $field['id']; ?>" name="<?php echo $field['id']; ?>">
            <span class="filename">
            <?php if(get_post_meta($post->ID, $field['id'], true) != '') : ?>
            <a href="<?php echo wp_get_attachment_url( get_post_meta($post->ID, $field['id'], true) ); ?> " target="_blank"><?php echo get_the_title(get_post_meta($post->ID, $field['id'], true)); ?></a> -
            <?php endif; ?>
            </span>
            <a href="#addfile" data-target="<?php echo $field['id']; ?>" data-label="<?php echo $field['label']; ?>" class="addfile">Ajouter le fichier</a>
          <?php elseif($field['type'] == 'textarea') : ?>
            <textarea id="<?php echo $field['id']; ?>" name="<?php echo $field['id']; ?>" rows="10" cols="50"><?php echo get_post_meta($post->ID, $field['id'], true); ?></textarea>
          <?php elseif ($field['type'] == 'wysiwyg') : ?>
            <?php $my_post_meta = get_post_meta($post->ID, $field['id'], true);?>
            <?php wp_editor(htmlspecialchars_decode($my_post_meta), $field['id'], $settings = array('textarea_rows' => 10)); ?>
          <?php elseif($field['type'] == 'select') : ?>
            <select id="<?php echo $field['id']; ?>" name="<?php echo $field['id']; ?>">
              <?php foreach ($field['options'] as $key => $value): ?>
                <option value="<?php echo $key; ?>" <?php if (get_post_meta($post->ID, $field['id'], true) == $key): ?>selected<?php endif ?>><?php echo $value; ?></option>
              <?php endforeach ?>
            </select>
          <?php elseif ($field['type'] == 'number'): ?>
            <input type="number" id="<?php echo $field['id']; ?>" name="<?php echo $field['id']; ?>" value="<?php echo get_post_meta($post->ID, $field['id'], true); ?>">
          <?php else : ?>
            <?php _e('Unknown input type'); ?> <?php echo $field['type']; ?>
          <?php endif; ?>
        </td>
      </tr>
    <?php endforeach; ?>
    </table>
    <?php
  }

  /**
   * When the save action is triggered, we save the meta data
   * @param integer $post_id Current post id
   */
  public function meta_box_save($post_id){
    if (!is_user_logged_in())
      return;

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
      return;

    if (!isset($_POST[$this->cpt_name]) OR  !wp_verify_nonce( $_POST[$this->cpt_name], plugin_basename( __FILE__ ) ) )
      return;

    if($this->cpt_name == $_POST['post_type']) {
      if ( !current_user_can( 'edit_post', $post_id ) )
        return;
    } else return;

    foreach($this->meta_fields as $mfb){
      foreach ($mfb as $mf) {
        if(isset($_POST[$mf['id']])){
          update_post_meta($post_id, $mf['id'], $_POST[$mf['id']]);
        } else {
          delete_post_meta($post_id, $mf['id']);
        }
      }
    }
  }

  /**
   * Change the columns when listings the custom post
   * @param array $columns Contains default columns to display
   * @return array Array of columns to display
   */
  public function custom_columns($columns) {
    return $this->custom_columns;
  }

  /**
   * Define the sortable columns
   * @param array $columns Array of string for column's name
   * @return array Formatted array for sorting columns
   */
  public function custom_columns_sort($columns) {
    return $this->sortable_columns;
  }

  /**
   * Define the content for custom columns
   * @param array $name Array of name for columns to display
   */
  public function custom_columns_show($name) {
    global $post;
    foreach ($this->custom_columns_show as $show) {
      switch ($show->type) {
        case 'term':
          $terms = get_the_term_list( $post->ID, $show->id, '', ',', '' );
          if ( is_string( $terms ) ) {
            echo $terms;
          } else {
            echo '-';
          }
        break;
        case 'meta':
          echo get_post_meta( $post->ID, $show->id, true );
        break;
      }
    }
  }

}