/**

hds.EventHandler

Assigns and handles all click/hover/other javascript events in the application.

Parms:
@param parent Object  the hds object, if one exits
@param $      Object  A reference to JQuery
*/
var hds = (function(parent, $)  {
  var $ = jQuery;
  // Get Orca into a convenient "my" variable.
  var my = parent = parent || {};
  // Define the module.  -- There is a seprate file that adds in the Calculations object to Strategies and we don't want to overwrite that.
  if (!("EventHandler" in my)) {
    my.EventHandler = {};
  }
  // Make a local handle for ease of use
  var self = my.EventHandler;

  
  self.findBootstrapEnvironment = function() {
    var envs = ["ExtraSmall", "Small", "Medium", "Large"];
    var envValues = ["xs", "sm", "md", "lg"];

    var $el = $('<div>');
    $el.appendTo($('body'));

    for (var i = envValues.length - 1; i >= 0; i--) {
      var envVal = envValues[i];

      $el.addClass('hidden-'+envVal);
      if ($el.is(':hidden')) {
        $el.remove();
        return envs[i];
      }
    };
  }



  /**
  attachEventHandlers

  actually attaches references to local functions to objects in the DOM, through JQuery
  */
  self.attachEventHandlers = function() {
  	jQuery('.moretag').click(self._showMore);
    jQuery('.services a').click(function(e) {
      e.preventDefault();
      //console.log($(this));
      self._showServiceContent($(this));
    });
    jQuery('.team a').click(function(e) {
      e.preventDefault();
      //console.log($(this));
      self._showTeamMemberContent($(this));
    });
    
  }


  /*************
  EVENT HANDLERS
  **************/
  self._showTeamMemberContent = function(clickedTeamMember) {
    theContent = $(clickedTeamMember.find('.team-member-content')[0])
    $('.content-copy').hide();

    if (clickedTeamMember.find('.team-member').hasClass('selected')) {
      $('.team-member').removeClass('selected');
    } else {
      $('.team-member').removeClass('selected');
      clickedTeamMember.find('.team-member').addClass('selected');

      // Check what environment we're on, which determines the number of sevices per row
      // which tells us to which one we need to attach the teamMember description.
      // Here's the breakdown from team.php:
        // col-lg-3 == 4 per row
        // col-md-4 == 3 per row
        // col-sm-6 == 2 per row
        // col-xs-12 == 1 per row
      var teamMemberIndex = clickedTeamMember.find('.team-member').attr('data-team-member-id');
      if (self.findBootstrapEnvironment() == "Large") { // 4 per row
        boxesPerRow = 4;
      } else if (self.findBootstrapEnvironment() == "Medium") { // 3 per row
        boxesPerRow = 3;
      } else if (self.findBootstrapEnvironment() == "Small") { // 2 per row
        boxesPerRow = 2;
      } else if (self.findBootstrapEnvironment() == "ExtraSmall") { // 1 per row
        boxesPerRow = 1;
      }

      var attachToIndex = Math.ceil(teamMemberIndex/boxesPerRow) * boxesPerRow - 1;
      // make sure we don't try to attach to one that doesn't exist because there isn't a full row on the bottom:
      attachToIndex = Math.min(attachToIndex, $('.team-member').length - 1);

      var attachToTeamMember = $('.team a')[attachToIndex];
      attachToTeamMember = $(attachToTeamMember);
      
      var theContentCopy = theContent.clone().appendTo(attachToTeamMember);
      theContentCopy.show().addClass('content-copy');
    }
  }

  self._showServiceContent = function(clickedService) {
    theContent = $(clickedService.find('.service-content')[0])
    $('.content-copy').hide();

    if (clickedService.find('.service').hasClass('selected')) {
      $('.service').removeClass('selected');
    } else {
      $('.service').removeClass('selected');
      clickedService.find('.service').addClass('selected');

      // Check what environment we're on, which determines the number of sevices per row
      // which tells us to which one we need to attach the service description.
      // Here's the breakdown from services.php:
        // col-lg-3 == 4 per row
        // col-md-4 == 3 per row
        // col-sm-6 == 2 per row
        // col-xs-12 == 1 per row
      var serviceIndex = clickedService.find('.service').attr('data-service-id');
      if (self.findBootstrapEnvironment() == "Large") { // 4 per row
        boxesPerRow = 4;
      } else if (self.findBootstrapEnvironment() == "Medium") { // 3 per row
        boxesPerRow = 3;
      } else if (self.findBootstrapEnvironment() == "Small") { // 2 per row
        boxesPerRow = 2;
      } else if (self.findBootstrapEnvironment() == "ExtraSmall") { // 1 per row
        boxesPerRow = 1;
      }

      var attachToIndex = Math.ceil(serviceIndex/boxesPerRow) * boxesPerRow - 1;
      // make sure we don't try to attach to one that doesn't exist because there isn't a full row on the bottom:
      attachToIndex = Math.min(attachToIndex, $('.service').length - 1);

      var attachToService = $('.services a')[attachToIndex];
      attachToService = $(attachToService);
      
      var theContentCopy = theContent.clone().appendTo(attachToService);
      theContentCopy.show().addClass('content-copy');
    }
    
    
      

      //theContent.show();
    



    /*$('li.selectedService').removeClass('selectedService')
    $('.serviceDescription').remove()
    bpr = Math.min(5, parseInt($(window).width() / 240)) # bpr = boxes per row.  240px is the width set in css of each services box.
    attachToIndex = Math.ceil(index/bpr) * bpr
    if attachToIndex > lastIndex
        attachToIndex = lastIndex
    container = $('<li id="' + service + '">' + getServiceContentText(service) + '</li>').addClass('serviceDescription').insertAfter('.service:nth-child(' + attachToIndex + ')')
    $('.service:nth-child(' + index + ')').addClass('selectedService')*/

    /*console.log(theService);
    clickedService.addClass('selected');
    theService.show();
    //index = parseInt(index);
    lastIndex = $('.service').length;*/
    //console.log(index)
    //console.log(event)
    /*if service == $('.service-content').attr('id')
      $('.serviceDescription').remove()
      $('li.selectedService').removeClass('selectedService')
      console.log('same')
    else 
      $('li.selectedService').removeClass('selectedService')
      $('.serviceDescription').remove()
      bpr = Math.min(5, parseInt($(window).width() / 240)) # bpr = boxes per row.  240px is the width set in css of each services box.
      attachToIndex = Math.ceil(index/bpr) * bpr
      if attachToIndex > lastIndex
          attachToIndex = lastIndex
      container = $('<li id="' + service + '">' + getServiceContentText(service) + '</li>').addClass('serviceDescription').insertAfter('.service:nth-child(' + attachToIndex + ')')
      $('.service:nth-child(' + index + ')').addClass('selectedService')
*/
  }
  

//getServiceContentText = (service) ->


  /*self._showServiceContent = function(event) {
    event.preventDefault();
    console.log($(event.target).parent().siblings('.service-content'));
    $(event.target).parent().siblings('.service-content').show();
  }*/

  return my;

})(hds || {}, jQuery);

/**

hds.Init

Assigns and handles all click/hover/other javascript events in the application.

Parms:
@param parent Object  the hds object, if one exits
@param $      Object  A reference to JQuery
*/
var hds = (function(parent, $)  {
  var $ = jQuery;
  // Get Orca into a convenient "my" variable.
  var my = parent = parent || {};
  // Define the module.  -- There is a seprate file that adds in the Calculations object to Strategies and we don't want to overwrite that.
  if (!("Init" in my)) {
    my.Init = {};
  }
  // Make a local handle for ease of use
  var self = my.Init;

  /**
  attachEventHandlers

  actually attaches references to local functions to objects in the DOM, through JQuery
  */
  self.main = function() {
    self._addBootstrapClasses();
    
  }


  /*************
  EVENT HANDLERS
  **************/
  self._addBootstrapClasses = function(event) {

  }

  return my;

})(hds || {}, jQuery);



// Call our functions now that they're ready.
jQuery(document).ready(function() {
  hds.Init.main();
  hds.EventHandler.attachEventHandlers();
  
});