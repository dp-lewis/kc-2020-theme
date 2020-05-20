(function($) {
  $.fn.kcImageUploader = function() {
    let frame;
    return this.each(function() {
      const $this = $(this);
      const $imgIdInput = $this.find('input[type="hidden"]');
      const $imgElement = $this.find('img');

      $this.find('button').on('click', function() {
        event.preventDefault();

        if (frame) {
          frame.open();
          return;
        }

        frame = wp.media({
          title: 'Select or Upload Image',
          button: {
            text: 'Use this Image'
          },
          multiple: false
        });

        frame.on( 'select', function() {
          var attachment = frame.state().get('selection').first().toJSON();
          $imgIdInput.val( attachment.id );
          $imgElement.attr('src', attachment.url);
          $imgIdInput.trigger('change');
        });
    
        frame.open();        
      });
    });
  }

  $(function() {
    $('.js-imageuploader').kcImageUploader();
  });
})(jQuery);
