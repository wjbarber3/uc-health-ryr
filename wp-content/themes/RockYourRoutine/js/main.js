(function($){

    /*
    |--------------------------------------------------------------------------
    | ACCORDION FUNCTIONALITY
    |--------------------------------------------------------------------------
    | This object houses any functionality associated with accordions
    |
    */
    Accordion = {
        trigger : '.accordion h2',
        content: '.accordion .accordion-content',
        item: '.accordion .accordion-item',
        listContainer: '#appended-list',
        close: '.close-details',
        init: function() {
            $(this.trigger).click(this.controlAccordion.bind(this));
            $(this.item).click(this.appendList.bind(this));
            $(this.close).click(this.removeList.bind(this));
        },
        controlAccordion: function(e) {
            var target = $(e.target);
            target.siblings(this.content).slideToggle();
            $(this.content).removeClass("off");
            $(this.listContainer).removeClass("active").empty();
            $(this.close).hide();
        },
        appendList: function(e) {
            var target = $(e.target),
                neededList = target.find(".accordion-details").html();
            $(this.content).addClass("off");
            $(this.close).fadeIn("slow");
            $(this.listContainer).addClass("active").append(neededList);
            $('html, body').animate({
                scrollTop: $(this.listContainer).offset().top - 120
            }, 1000);
        },
        removeList: function() {
            $(this.content).removeClass("off");
            $(this.listContainer).removeClass("active").empty();
            $(this.close).hide();
        }
    }

    $(document).ready(function() {
        Accordion.init();
    })

})(jQuery);
