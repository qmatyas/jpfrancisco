<?php 
/**
 * Add meta for pages
 *
 * @author  Ayctor <devs@ayctor.com>
 */

require_once('qm_cpt.php');

/**
 * Add meta for pages
 */
class jpProjet extends qmCPT{
  public $cpt_name = 'jp_projets';

  public function __construct(){
    add_action('init', array($this, 'init'));
    add_action('save_post', array($this, 'meta_box_save'));
    add_action('add_meta_boxes', array($this, 'meta_box_cb'));
  }
  public function init(){
     $cpt_labels = array(
      'name' => 'Projets',
      'singular_name' => 'Projets',
      'add_new' => 'Ajouter un Projet',
      'add_new_item' => 'Ajouter un Projet',
      'edit_item' => 'Editer un Projet',
      'new_item' => 'Nouveau Projet',
      'all_items' => 'Tous les Projets',
      'view_item' => 'Voir le Projet',
      'search_items' => 'Chercher un Projet',
      'not_found' =>  'Aucun Projet trouvé',
      'not_found_in_trash' => 'Aucun Projet trouvé dans la corbeille',
      'parent_item_colon' => '',
      'menu_name' => 'Projet'
    );
    $cpt_args = array(
      'labels' => $cpt_labels,
      'public' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'show_ui' => true,
      'show_in_menu' => true,
      'show_in_nav_menus' => true,
      'query_var' => true,
      'capability_type' => 'post',
      'has_archive' => false,
      'hierarchical' => false,
      'menu_icon' => 'dashicons-hammer',
      'rewrite' => false,
      'menu_position' => null,
      'supports' => array('title', 'editor', 'thumbnail')
    );

    register_post_type($this->cpt_name, $cpt_args);

    /******** Metabox phrase intro métier *********/
    $this->addMetaBoxes('jp-projets', 'Projets');
    $this->addField('jp_projet_url', 'lien de la vidéo :', 'jp-projets', 'text');
    $this->addField('jp_projet_text', 'texte projet :', 'jp-projets', 'textarea');
  }

  public static function getAllProjects(){
    return get_posts(array(
      'posts_per_page'  => -1,
      'post_type'     => 'jp_projets',
      'order'       => 'ASC',
      'post_status'   => 'publish'
    ));
  }

}  
new jpProjet();

 ?>