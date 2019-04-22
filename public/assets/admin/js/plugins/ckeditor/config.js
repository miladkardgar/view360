/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {

    config.contentsCss = '/public/assets/admin/js/plugins/ckeditor/fonts.css';
    config.font_names = 'IRANSans;' + config.font_names;
    config.font_names = 'Titr;' + config.font_names;
    config.font_names = 'Nastaliq;' + config.font_names;


    config.extraPlugins = 'filebrowser';

};
