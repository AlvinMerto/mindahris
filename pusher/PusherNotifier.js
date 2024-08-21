function PusherNotifier(channel, options) {
    options = options || {};

    this.settings = {
        eventName: 'notification',
        title: 'Notification',
        titleEventProperty: 'title', // if set the 'title' will not be used and the title will be taken from the event
        eventTextProperty: 'message'
    };

    $.extend(this.settings, options);

    var self = this;
    channel.bind(this.settings.eventName, function(data){ self._handleNotification(data); });
};

PusherNotifier.prototype._handleNotification = function(data) {

   // console.log('test');

    var title = data[this.settings.titleEventProperty];
    var msg = data[this.settings.eventTextProperty];
    var created_by = data[this.settings.eventCreatedBy];
    var createdbyname = data[this.settings.eventCreatedByName];
    var owner_id = data[this.settings.eventOwnerId];
    var owner_name = data[this.settings.evenetOwnerName];
    var profile_pic = data[this.settings.profilePicture];

/*    if(created_by == USER_LOGGED_ID){
        created_by = "You ";
    }else{
        created_by = createdbyname;
    }

    if(owner_id == USER_LOGGED_ID){
        owner_id = "you!";
    }else{
        owner_id = owner_name;
    }*/

    msg = '<div style="float:left; width:20%;"><img class="media-object image_round_border" src="'+profile_pic+'" alt=""></div><div style="width:80%; float:right; font-size:12px; line-height:17px;">' + created_by + ' ' + msg + ' ' + owner_id + '</div><div style="clear:both;"></div>';

    $.jGrowl(msg,{
        sticky: false,
        theme: 'growl-primary',
    position: 'bottom-left',
    animateOpen: { opacity: 'show' },
    animateClose: { opacity: 'hide' },
        header: title,
        life: '20000'
    });

    generateCounterActivity();

    alert(BASE_URL);
  
/*  var count_activity = $('#jqxHeaderActivityLogsCount').html();
  var total_activity;
  total_activity = parseInt(count_activity) + 1;
  
  $('#jqxHeaderActivityLogsCount').html(total_activity);
  $('#jqxHeaderActivityLogsCount').show();
  
    getactivitylogs1();*/
};


  function generateCounterActivity(){
    var count_activity =  parseInt($('#label_count_activity').html());
    if(count_activity){
        count_activity+=1;
        $('#label_count_activity').html(count_activity);
    }else{
      $('#label_count_activity').html(1);
    }
  }

  function writeActivityLogs(){


  }