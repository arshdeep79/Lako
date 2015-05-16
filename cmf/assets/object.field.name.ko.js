function object_field_name(text,subscriber){
  var self           = this;
  this.text          = ko.observable(text);
  this.text_live     = ko.observable(text);
  this._text_old     = this.text();
  //If we should show that data is valid or invalid
  this.is_valid    = ko.computed(function(){
    return Boolean(self.text_live().match(/^[a-z][a-z0-9_]{1,20}$/));
  });
  //.// list of  triggers //.//
    //object_name_created {name:"the_name"}
    //object_name_changed {old_name:"the_name", name:"the_new_name"}
  //track changes and send to subscriber
  this.text.subscribe(function(new_value){
    //TODO- we want to validate it before doing anything else.
    console.log(new_value);
    var event = null;
    if((self._text_old == ''))
      event = {
        event_type  : 'object_name_created',
        data        : { name: new_value }
      };
    else
      event = {
        event_type  : 'object_name_changed',
        data        : { old_name: self._text_old , name: new_value }
      };
      
    self._text_old = new_value;
    if(subscriber)
      subscriber(event);
  });

  
}