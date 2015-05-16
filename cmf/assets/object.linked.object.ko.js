function object_linked_object(){
  var self           = this;
  this.name          = new object_field_name('');
  this.link_type     = ko.observable('');
  this.object        = ko.observable('');
}