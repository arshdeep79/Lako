function object_create(){
  var self              = this;
  this.name             = null,
  this.local_data       = ko.observableArray([]),
  this.linked_objects   = ko.observableArray([]);
  this.events           = ko.observableArray([]);
  
  //Methods
  this.new_local_data = function(){
    self.local_data.push(new object_local_data(self.handle_events));
  };
  
  this.delete_local_data = function(item){
    if(confirm('Do you really want to delete this local data? This may cause errors in your existing code.'));
      self.local_data.remove(item);
  }
  this.new_linked_object = function(){
    self.linked_objects.push(new object_linked_object());
  };
  
  this.delete_linked_object = function(item){
    if(confirm('Do you really want to delete this link with object? This may cause errors in your existing code.'));
      self.linked_objects.remove(item);
  }
  
  
  
  //.// list of all triggers //.//
    //object_name_created
    //object_name_changed
    
    //local_data_created
    //local_data_name_changed
    //local_data_datatype_changed
    //local_data_name_cleared
    //local_data_removed
    
    //linked_object_inserted
    //linked_object_name_created
    //linked_object_name_changed
    //linked_object_link_type_changed
    //linked_object_object_changed
    //linked_object_removed
  
  //We will pass all the triggers to our handler which translate these trigger into SQL
  this.handle_events = function(event){
    console.log(event);
    self.events.push(event);
  }
  
  
  
  //.// Initialize local fields
  this.name  = new object_field_name('',this.handle_events);
  
}
ko.applyBindings(new object_create(), $('.form-object-create')[0]);