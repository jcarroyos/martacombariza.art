## Image Raw Formatter

This formatter return absolute URL of original images or image style if is configured. 
The default formatter for image doesn't work for REST services because it return 
HTML tags for images.

### Usage

 * In your content type create a new Image field
 * Go to /admin/structure/types/manage/[Content-Type]/display
 * Change the format field to use Image Raw formatter
 * Or select formatter in views fields images
