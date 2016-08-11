<?php
/**
 * Metaboxes
 *
 * @author  Quentin MATYAS
 */
	require_once('qm_cpt.php');

class qmPage extends qmCPT{
  public $cpt_name = 'page';

  /**
    * Instanciate the class and add filters and actions
    */
  public function __construct(){
      add_action('init', array($this, 'init'));
      add_action('save_post', array($this, 'meta_box_save'));
      add_action('add_meta_boxes', array($this, 'meta_box_cb'));
      add_action( 'admin_head', array($this, 'hide_editor') );
  }

  public function init(){
  	if ($_GET['post'] == $this->get_id_by_slug('homepage')){
      $this->addMetaBoxes('jp-about', 'Editer la section Mon parcours');
      $this->addMetaBoxes('jp-stage', 'Editer la section stages à venir');
    }
    $this->addField('jp_about', 'A propos :', 'jp-about', 'wysiwyg');
    $this->addField('jp_deroulement_stage', 'déroulement du stage :', 'jp-stage', 'wysiwyg');
    $this->addField('jp_dates_stage', 'Tarifs :', 'jp-stage', 'wysiwyg');
    $this->addField('jp_tarif_stage', 'Tarifs :', 'jp-stage', 'textarea');
    $this->addField('jp_lieu_stage', 'Lieu :', 'jp-stage', 'textarea');
  }

  public static function get_id_by_slug($page_slug){
    $page = get_page_by_path($page_slug);
      if ($page) {
        return $page->ID;
      } else {
        return null;
      }
  }

  public static function hide_editor() {
    global $post;
      $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
      if( !isset( $post_id ) ) return;

      $pagename = get_the_title($post_id);
      if($pagename == 'Homepage'){ 
        remove_post_type_support('page', 'editor');
      }

  }
}
new qmPage();

?>