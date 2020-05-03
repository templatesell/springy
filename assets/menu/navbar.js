/**
* This file contains the jquery for the actual menu
*/
jQuery(function($) {

    "use strict";

     	var $win = $(window);
	    var $doc = $(document);
	    var $main_nav = $('.main-nav > li');
	    var $main_nav_a = $('.main-nav > li > a');
	    var $drop_list = $('.drop-list');
	    var $main_content = $('.main-content');
	    var $ts_submenu_list = $('.ts_submenu-list');
	    var $drop_list_li = $('.drop-list > li');
	    var $ts_submenu_list_li = $('.ts_submenu-list > li');
	    var $ts_submenu = $('.ts_submenu');
	    var $parent = $('.parent');
	    var $child = $('.child');
	    var $menu_of_left = $('.menu-of-left');
	    var $of_menu_left = $('.of-menu-left');
	    var $canvas_left = $('.canvas-left');
	    var $menu_of_right = $('.menu-of-right');
	    var $of_menu_right = $('.of-menu-right');
	    var $canvas_right = $('.canvas-right');
	    var $nav_menu_full = $('nav.menu-full');
	    var $menu_of_full = $('.menu-of-full');
	    var $close_btn_full = $('.close-btn-full');
        var int_drop_list = '.drop-list';
        var int_ts_submenu_list = '.ts_submenu-list'
        var $ts_dropdown = $('.ts_dropdown')
        var $ts_dropdown_a = $('.ts_dropdown >a')
        var $ts_no_dropdown_a= $('.main-nav >li:not(".ts_dropdown") >a')

    // =================greater than 1000======================

    if ($win.width() > 1000) {

        // -----------------main mn_dropdown-----------------
        $ts_dropdown_a.focus(function() {
            $drop_list.removeClass('block-nav');
                 $(this).parent('li').find($drop_list).addClass('block-nav');
            });

        $ts_no_dropdown_a.focus(function() {
            $drop_list.removeClass('block-nav');
        });
        // -----------------main ts_dropdown-----------------

        if ($main_nav.length) {
            $main_nav.on('mouseover', function() {
                $drop_list.removeClass('block-nav');
                $(this).find(int_drop_list).addClass('block-nav');
            });
            
        }

        if ($main_content.length) {
            $main_content.on('mouseover',function() {
                $drop_list.removeClass('block-nav');
            });
        }

        // -----------------ts_submenu-----------------

        if ($ts_submenu_list.length) {

              $main_nav_a.on('mouseover', function(){
            $ts_submenu_list.removeClass('block-nav');
            });

            $drop_list_li.on('mouseenter',function() {
                $ts_submenu_list.removeClass('block-nav');
                $(this).find(int_ts_submenu_list).first().addClass('block-nav');
            });

            $ts_submenu_list_li.on('mouseenter', function() {
                if ($ts_submenu.hasClass('parent')) {
                    $parent.on('mouseenter', function() {
                        $(this).children(int_ts_submenu_list).first().toggleClass('child');
                    });
                }
                $(this).children(int_ts_submenu_list).addClass('child');
                $child.removeClass('block-nav');
                $(this).closest('ul').find('.child').removeClass('block-nav');
                $(this).find(int_ts_submenu_list).first().addClass('block-nav');
                $child.parent().addClass('parent')
            })
        }

    }

    // end of > 1000

    // =================lower than 1000======================

    if ($win.width() <= 1000) {
        
        $ts_dropdown.removeClass('image-list');


        if ($main_nav.length) {

            $main_nav_a.on('click', function() {
                var style = $(this).parent().find(int_drop_list).attr('style');
                $drop_list.slideUp();
                if (style != 'display: block;') {
                    $(this).parent().find(int_drop_list).slideToggle();
                }
            });
        }

        if ($main_content.length) {
            $main_content.on('click', function() {
                $drop_list.slideUp();
            });
        }

        // -----------------ts_submenu-----------------

        if ($ts_submenu_list.hasClass('block-nav')) {
            $drop_list_li.on('click', function() {
                $ts_submenu_list.removeClass('block-nav');
            });
        } else {
            $drop_list_li.on('click' , function() {
                $(this).find(int_ts_submenu_list).first().addClass('block-nav');
            });
        }

        $ts_submenu_list_li.on('click', function() {
            if ($ts_submenu.hasClass('parent')) {
                $parent.on('click', function() {
                    $(this).children(int_ts_submenu_list).first().toggleClass('child');
                });
            }
            $(this).children(int_ts_submenu_list).addClass('child');
            $child.removeClass('block-nav');
            $(this).find(int_ts_submenu_list).first().addClass('block-nav');
            $child.parent().addClass('parent')
        })

        var ts_dropdown_a = $('.ts_dropdown > a')
        ts_dropdown_a.on('click', function() {
            $ts_submenu_list.removeClass('block-nav');
        });
    }
   


    // -----------------search box-----------------

    var $search_box = $('.search-box');
    var $search_input = $('.search-input');
    if ($search_box.length) {
        $search_box.on('click', function() {
            $search_input.toggleClass('search-block')
        });
    }

    // -----------------hamburger-----------------
    var $menu_box = $('.menu-box');
    var $nav = $('nav');
    $menu_box.on('click', function() {
        $(this).toggleClass('clicked')
        $nav.toggleClass('nav_on')
        $drop_list.slideUp();
    });


    // -----------------fixed-----------------
    $doc.scroll(function() {

        var $fixed_nav = $(".fixed-nav");
        var st = $(this).scrollTop();
        if (st > 0) {
            // alert("");
            $fixed_nav.addClass('scroll-background');
        } else {
            $fixed_nav.removeClass('scroll-background');
        }
    });



});