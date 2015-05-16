function object_local_data(subscriber){
  var self           = this;
  this.name          = null,
  
  this.data_type_options= ko.observableArray([
                            {
                              'name'  : 'Text (upto 100)',
                              'value' : 'Text (upto 255)',
                            },
                            
                            {
                              'name' : 'Large text',
                              'value' : 'Text (upto 255)',
                            },
                              
                            {
                              'name' : 'True or False',
                              'value' : 'Text (upto 255)',
                            },
                            
                            {
                              'name' : 'Number (+,-)',
                              'value' : 'Text (upto 255)',
                            },                          
                            {  
                              'name' : 'Number (-)',
                              'value' : 'Text (upto 255)',
                            },
                            
                            {
                              'name' : 'Number (+)',
                              'value' : 'Text (upto 255)',
                            }
                          ]);
  
  this.data_type = ko.observable([this.data_type_options()[0]]);
  this._data_type_old = this.data_type();
  
  //.// list of all triggers //.//
    //local_data_created
    //local_data_name_changed
    //local_data_datatype_changed
    //local_data_name_cleared
    //local_data_removed
  
  //first
  this.name = new object_field_name('',function(event){
    if(event.event_type == 'object_name_created')
      event.event_type = 'local_data_created';
    else
      event.event_type = 'local_data_name_changed';
    
    event.data.datatype = self.data_type();
    
    if(subscriber)
      subscriber(event);
    
  });
    
  //data type
  this.data_type.subscribe(function(new_value){
    var event = {
        event_type  : 'local_data_datatype_changed',
        data        : { name          : self.name.text(),
                        old_data_type : self._data_type_old , 
                        data_type     : new_value 
                      }
      };
      
    self._data_type_old = new_value;
    if(subscriber)
      subscriber(event);
    
  })
    
}