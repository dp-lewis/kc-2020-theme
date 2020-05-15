jQuery(function($){

    // Set all variables to be used in scope
    var frame,
        addImgLink = $('.image_upload1'),
        imageTag = $('.image1tag'),
        imgIdInput = $('.image1');
  
    // ADD IMAGE LINK
    addImgLink.on( 'click', function( event ){
  
      event.preventDefault();
  
      // If the media frame already exists, reopen it.
      if ( frame ) {
        frame.open();
        return;
      }
  
      // Create a new media frame
      frame = wp.media({
        title: 'Select or Upload Image',
        button: {
          text: 'Use this Image'
        },
        multiple: false  // Set to true to allow multiple files to be selected
      });
  
  
      // When an image is selected in the media frame...
      frame.on( 'select', function() {
  
        // Get media attachment details from the frame state
        var attachment = frame.state().get('selection').first().toJSON();
  
        // Send the attachment URL to our custom image input field.
        //imgContainer.append( '<img src="'+attachment.url+'" alt="" style="max-width:100%;"/>' );
  
        // Send the attachment id to our input field
        imgIdInput.val( attachment.id );
        imageTag.attr('src', attachment.url);
        imgIdInput.trigger('change');
      });
  
      // Finally, open the modal on click
      frame.open();
    });
  
  });