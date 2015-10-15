(function($) {
  'use strict';

  var socialShare = {

    defaults: function() {
      this.$href = $(event.target).attr('href'),
      this.$title = 'Share on ' + $(event.target).attr('data-socialShare-site'),
      this.$left = (screen.width/2)-(550/2),
      this.$top = (screen.height/2)-(300/2);
      return this;
    },

    actions: function() {
      $('[data-share="link"]').click(function(e){
        e.preventDefault();
        window.open(this.$href, this.$title, 'height=300,width=550,resizable=1, \'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no,top=' + this.$top + ', left=' + this.$left);
      });
    },

    init: function() {
      this
        .defaults()
        .actions();
    }

  };

  $(document).ready(socialShare.init);

})(jQuery);
