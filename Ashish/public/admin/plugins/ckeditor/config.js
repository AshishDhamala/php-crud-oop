/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';

	config.toolbarGroups = [ {
			name: 'clipboard',
			groups: [ 'clipboard', 'undo' ]
		}, {
			name: 'basicstyles',
			groups: [ 'basicstyles', 'cleanup' ]
		}, {
			name: 'links'
		}, {
			name: 'insert'
		}, {
			name: 'tools'
		},
		/*
				'/', */
		{
			name: 'paragraph',
			groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ]
		}, {
			name: 'document',
			groups: [ 'mode', 'document', 'doctools' ]
		}, {
			name: 'editing',
			groups: [ 'find', 'selection', 'spellchecker' ]
		}, {
			//name: 'forms'
		},
		/*
				'/', */
		{
			name: 'styles'
		}, {
			name: 'colors'
		}, {
			name: 'others'
		}, {
			name: 'about'
		}
	];

};