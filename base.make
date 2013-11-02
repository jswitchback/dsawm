; Make file for base install.
; Create folder. Add this file. Run "drush make base.make" inside folder in Terminal.

core = 7.x

api = 2

projects[drupal][version] = 7.23



;;;; CORE FEATURES ;;;;;;;;;;;;;;;;;;;;;;;;;;;



projects[libraries][subdir] = "contrib"
;projects[libraries][version]= 2.1

projects[views][subdir] = "contrib"
;projects[views][version]= 3.7

projects[ctools][subdir] = "contrib"
;projects[ctools][version] = 1.3

projects[token][subdir] = "contrib"
;projects[token][version] = 1.5

projects[pathauto][subdir] = "contrib"
;projects[pathauto][version] = 1.2

projects[backup_migrate][subdir] = "contrib"
;projects[backup_migrate][version] = 2.7

projects[jquery_update][subdir] = "contrib"
;projects[jquery_update][version] = 2.3

projects[imce][subdir] = "contrib"
;projects[imce][version] = 1.7

projects[entityreference][subdir] = "contrib"
;projects[entityreference][version] = 1.0

projects[menu_block][subdir] = "contrib"
;projects[menu_block][version] = 2.3

; **** Trim with Views voracity in the manage display settings
;projects[smart_trim][subdir] = "contrib"
;projects[smart_trim][version] = 1.4

projects[masquerade][subdir] = "contrib"
;projects[masquerade][version] = 1.0-rc5

; organize module list on vertical tabs
projects[module_filter][subdir] = "contrib"
;projects[module_filter][version] = 1.8

projects[workbench][subdir] = "contrib"
;projects[workbench][version] = 1.3



;;;; COMMON FEATURES ;;;;;;;;;;;;;;;;;;;;;;;;;;;



;---- cck fields ----;


projects[email][subdir] = "contrib"
;projects[email][version] = 1.2

projects[link][subdir] = "contrib"
;projects[link][version] = 1.1

; ***** Required by Calendar module
projects[date][subdir] = "contrib"
;projects[date][version] = 2.0-rc1

projects[addressfield][subdir] = "contrib"
;projects[addressfield][version] = 1.0-beta4



;---- wysiwyg -----;


; **** Use wysiwyg module with tinymce or 
; Ckeditor module with ckeditor.js for greater control over buttons
;projects[wysiwyg][subdir] = "contrib"
;projects[wysiwyg][version] = 2.2

; ***** Requires IMCE module. Integrate file browser into wysiwyg module
;projects[imce_wysiwyg][subdir] = "contrib"
;projects[imce_wysiwyg][version] = 1.0

; ***** Adds additinal field to insert images into wysiwyg. Uses image styles
;projects[insert][subdir] = "contrib"
;projects[insert][version] = 1.2

projects[ckeditor][subdir] = "contrib"
;projects[ckeditor][version] = 1.13

; ***** Download ckeditor for use with ckeditor module
;libraries[ckeditor][download][type]= "get"
;libraries[ckeditor][download][url] = "http://download.cksource.com/CKEditor/CKEditor/CKEditor%203.6.2/ckeditor_3.6.2.tar.gz"
;libraries[ckeditor][directory_name] = "ckeditor"
;libraries[ckeditor][destination] = "libraries"



;----- media ------;


;projects[views_slideshow][subdir] = "contrib"
;projects[views_slideshow][version] = 3.0

projects[imagecache_actions][subdir] = "contrib"
;projects[imagecache_actions][version] = 1.4

;projects[media][subdir] = "contrib"
;projects[media][version] = 1.3

;****** User image crop solution with "focusable" crop area
;projects[imagefield_focus][subdir] = "contrib"
;projects[imagefield_focus][version] = 1.0

;****** User image crop solution with with nice crop overlay and buttons
;projects[manualcrop][subdir] = "contrib"
;projects[manualcrop][version] = 1.4



;---- search, rules & redirects ----;


projects[login_destination][subdir] = "contrib"
;projects[login_destination][version] = 1.1

;****** Redirect ui in node edit when path alias changed
projects[redirect][subdir] = "contrib"
;projects[redirect][version] = 1.0-rc1

;****** React to custom drupal events
;projects[rules][subdir] = "contrib"
;projects[rules][version] = 2.3

;****** Turn a 404 Page Not Found into a search
;projects[search404][subdir] = "contrib"
;projects[search404][version] = 1.3

;****** Narrow search by content type. Plus js advanced search dropdown
;projects[custom_search][subdir] = "contrib"
;projects[custom_search][version] = 1.13



;---- forms ----;


projects[webform][subdir] = "contrib"
;projects[webform][version]= 3.19

; ***** Better ui for creating webforms in general
projects[form_builder][subdir] = "contrib"
;projects[form_builder][version]= 1.4

; ***** Better ui for creating webform select lists
projects[options_element][subdir] = "contrib"
;projects[options_element][version]= 1.9

; ***** Add other field to select list
;projects[select_or_other][subdir] = "contrib"
;projects[select_or_other][version]= 2.20

;projects[webform_validation][subdir] = "contrib"
;projects[webform_validation][version]= 1.3

; **** API module to put several forms into one form
;projects[multiform][subdir] = "contrib"
;projects[multiform][version]= 1.0

;projects[mollom][subdir] = "contrib"
;projects[mollom][version]= 2.7

;projects[captcha][subdir] = "contrib"
;projects[captcha][version]= 1.0

;projects[hidden_captcha][subdir] = "contrib"
;projects[hidden_captcha][version]= 1.0

// Simple but could not add custom webforms to spamicide list
;projects[spamicide][subdir] = "contrib"
;projects[spamicide][version]= 1.1

; **** repository for advanced HTML5 form elements, that can be used by other developers 
; https://drupal.org/project/elements
;projects[elements][subdir] = "contrib"
;projects[elements][version]= 1.4



;---- Miscellaneous ----;


projects[better_exposed_filters][subdir] = "contrib"
;projects[better_exposed_filters][version]= 3.0-beta3

projects[google_analytics][subdir] = "contrib"
;projects[google_analytics][version]= 1.3

; ***** Requires date module
;projects[calendar][subdir] = "contrib"
;projects[calendar][version] = 3.0-alpha2

; ***** Add meta tag per page
;projects[metatag][subdir] = "contrib"
;projects[metatag][version] = 1.0-beta7



;;;; ADMINISTRATION ;;;;;;;;;;;;;;;;;;;;;;;;;;;



; ***** Group fields into tabs and accordions in the node edit page
projects[field_group][subdir] = "contrib"
;projects[field_group][version] = 1.2

; ***** admin_views dependant on views_bulk_operations
projects[admin_views][subdir] = "contrib"
;projects[admin_views][version] = 1.2

projects[views_bulk_operations][subdir] = "contrib"
;projects[admin_views][version] = 3.1

projects[admin_menu][subdir] = "contrib"
;projects[admin_menu][version] = 3.0-rc4

projects[context][subdir] = "contrib"
;projects[context][version] = 3.0-beta7



;;;; THEMING ;;;;;;;;;;;;;;;;;;;;;;;;;;;



; Add id & class attributes to menu links
;projects[menu_attributes][subdir] = "contrib"
;projects[menu_attributes][version] = 1.0-rc2

; Choose fields template wrappers in field settings
projects[fences][subdir] = "contrib"
;projects[fences][version] = 1.0

; ***** Has semantics block module for html5 block templates
;projects[borealis][subdir] = "contrib"
;projects[borealis][version] = 2.2

projects[styleguide][subdir] = "contrib"
;projects[styleguide][version] = 1.0

;projects[devel_themer][subdir] = "contrib"
;projects[devel_themer][version] = 1.x-dev



;---- Themes ----;


projects[zen] = 5.4

;projects[aurora] = Aurora

;***** Version 3. Configuration in UI
;projects[omega] = 3.1

;***** Version 4. Configuration in code
;projects[omega] = 4.0-rc1



;;;;  DEVELOPMENT ;;;;;;;;;;;;;;;;;;;;;;;;;;;



projects[devel][subdir] = "contrib"
;projects[devel][version] = 1.3

projects[features][subdir] = "contrib"
;projects[features][version] = 2.0-rc3

;***** Migrating content from other sites.
;projects[migrate][subdir] = "contrib"
;projects[migrate][version] = 2.5

;***** Migrating drupal 5/6/7 content to Drupal 7
;projects[migrate_d2d][subdir] = "contrib"
;projects[migrate_d2d][version] = 2.0


; **** Adds feature detection hooks for conditional css and module hooks
;projects[modernizr][subdir] = "contrib"
;projects[modernizr][version] = 3.1



;;;;;;;;;; LIBRARIES ;;;;;;;;;;;;;;;;;;;;;;;;;;;



; ***** Example
;libraries[awesome][download][type] = "get"
;libraries[awesome][download][url] = "http://example.com/awesome.js.zip"
;libraries[awesome][directory_name] = "awesome"
;libraries[awesome][destination] = "libraries"

; ***** Example library pulled from github
libraries[mediaelement][download][type] = "file"
libraries[mediaelement][download][url] = "https://github.com/johndyer/mediaelement/zipball/2.7.0"