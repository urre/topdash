<?php
/*
* Plugin Name: Topdash
* Plugin URI: http://github.com/urre/topdash
* Description: Like OS X admin bar menu icons, but for WordPress. Easy access to common wp-admin menus in the top right admin bar.
* Version: 1.0.0
* Author: Urban Sanden
* Author URI: http://urre.me
* License: GPL2
*/

/*  Copyright 2014 Urban Sanden (email: hej@urre.me)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class Topdash {

    function __construct() {

        if (is_admin()):
            # Register admin styles and scripts
            add_action( 'admin_print_styles', array( $this, 'register_admin_styles' ) );
            add_action( 'admin_enqueue_scripts', array( $this, 'register_admin_scripts' ) );

            # Add the icons
            add_action( 'wp_before_admin_bar_render', array( $this, 'add_icons' ) );
        endif;

    }

    public function register_admin_styles() {
        wp_enqueue_style( 'topdash-plugin-styles', plugins_url( 'topdash/css/topdash.admin.css' ) );
    }

    public function register_admin_scripts() {
        wp_enqueue_script( 'topdash-admin-script', plugins_url( 'topdash/js/topdash.admin.js' ), array('jquery') );
    }

    # Add the icons
    public function add_icons() {

        global $wp_admin_bar;

        $wp_admin_bar->add_menu(
            array(
                'id' => 'topdash_topdash_dashboard',
                'title' => __( '<span class="dashbar-icon dashbar-icon--dashboard"></span>' ),
                'href' => admin_url()
            )
        );

        $wp_admin_bar->add_menu(
            array(
                'id' => 'topdash_newpost',
                'title' => __( '<span class="dashbar-icon dashbar-icon--edit"></span>' ),
                'href' => admin_url( 'post-new.php' )
            )
        );

        $wp_admin_bar->add_menu(
            array(
                'id' => 'topdash_newpage',
                'title' => __( '<span class="dashbar-icon dashbar-icon--pages"></span>' ),
                'href' => admin_url( 'post-new.php?post_type=page' )
            )
        );

        $wp_admin_bar->add_menu(
            array(
                'id' => 'topdash_menus',
                'title' => __( '<span class="dashbar-icon dashbar-icon--menus"></span>' ),
                'href' => admin_url( 'nav-menus.php' )
            )
        );

        $wp_admin_bar->add_menu(
            array(
                'id' => 'topdash_widgets',
                'title' => __( '<span class="dashbar-icon dashbar-icon--widgets"></span>' ),
                'href' => admin_url( 'widgets.php')
            )
        );

        $wp_admin_bar->add_menu(
            array(
                'id' => 'topdash_media',
                'title' => __( '<span class="dashbar-icon dashbar-icon--media"></span>' ),
                'href' => admin_url( 'upload.php')
            )
        );

        $wp_admin_bar->add_menu(
            array(
                'id' => 'topdash_menus',
                'title' => __( '<span class="dashbar-icon dashbar-icon--menus"></span>' ),
                'href' => admin_url( 'nav-menus.php' )
            )
        );

        $wp_admin_bar->add_menu(
            array(
                'id' => 'topdash_external',
                'title' => __( '<span class="dashbar-icon dashbar-icon--external"></span>' ),
                'href' => home_url( )
            )
        );

    }

}

$topdash = new Topdash();
