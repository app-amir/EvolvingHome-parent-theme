# WordPress Theme EvolvingHome-parent-theme
EvolvingHome Pwered by AMIR SOHAIL

**WordPress Version:** 5.7.1

**Lead:** AMIR SOHAIL

**Data Entry:** Junior Team

**Front-End Team:** AMIR SOHAIL

**Back-End Team:** AMIR SOHAIL

**QA:** Dedicated Team

**Description:** EvolvingHome is the parent theme.

This theme is created to customize WordPress and fulfill the Project requirements. In this theme, we've created custom shortcodes, and templates for the theme.

## Dependencies ##
* DynamicConditions (Show/Hide Elementor widgets)
* EvolvingHome Functionality Plugin (used for Custom Post Type [CPT] management)
* ACF Pro (used extensively)
* Contact Form 7 (primary form builder)
* Safe SVG (Enable svg mime type for media)

## Registered Shortcode's ##

| Shortcode's | Description |
| ----------- | ----------- |
| evolvinghome_newsletter | Fetching the Custom fileds of contact form 7 for getting user emails ike subscription and displayed Gloabl widgets within same Shortcode |
| evolvinghome_work_posts |  Fetching the ACF fields data Get all the Posts from Work Display at Home Page with its related Category|
| evolvinghome_all_categories |  Fetching the ACF fields data Getting all the Work categories for Home Page and linked to its related post pages |
| evolvinghome_breadcrumb | Display Breadcrumb(Navigation) at every page of website |
| evolvinghome_quick_fix | Displaying Default post type Posts of displaying post for its related category with differetnt section of design at homepage it crafted by even and odd terms |
| evolvinghome_contact_newsletter | Fetching Just contact form 7 |
| mccain_current_year | get current year, used in footer. |
| mccain_default_archive | Create a structure for archive pages. ( Used `pre_get_posts` for setting the query args. ) |
| mccain_on_the_issue | Create a structure for `on-the-issue` category archive pages. |
| mccain_report_archive_filter | Create a structure for filter, used on reports archive. |
| mccain_podcast_archive_filter | Create a structure for filter, used on podcast archive. |
| mccain_event_archive_filter | Create a structure for filter, used on events archive. |
| mccain_issue_category_archive_filter | Create a structure for filter, used on the issue category archive. |
| mccain_featured_issue | Used in slider and called on the issues page. |
| mccain_staff_block | Fetch the Staff posts with ACF data and display them on the staff page. |
| mccain_ngl_block | Fetch the NGL posts with ACF data and display them on the leadership page. |


## Custom Templates ##
* No Custom Template.

## CPT's - (Inside the Plugin) ##

| CPT Name | Registered Name | Slug |
| ----------- | ----------- | ----------- |
| McCain Podcast | mccain-podcast | resources/podcast |
| McCain Reports | mccain-report | resources/reports |
| McCain Events | mccain-event | resources/events |
| McCain Quotes | mccain-quote | quotes |

## Custom Taxonomies - (Inside the Plugin) ##

| Taxonomy Name | Registered Name | Slug |
| ----------- | ----------- | ----------- |
| McCain Post Terms | mccain-term | term |
| McCain Event Tags | mccain-event-tags | tags |
| McCain Report Types | mccain-report-type | report-types |
| McCain Podcast Types | mccain-podcast-term | podcast-term |
| McCain Quote Types | mccain-quote-type | types |

## Images Sizes ##
Registered by WordPress:
* thumbnail: 150x150
* medium: 300x300
* medium_large: 768px x no height limit max
* large: 1024x1024
* full: Original image resolution (unmodified)

