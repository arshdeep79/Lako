<?php

function admin_objects_create_data_provider(){
  return array(
    'objects' => array(),
    'js'      => array(
                  '/lako/cmf/assets/knockout-3.3.0.js',
                  '/lako/cmf/assets/object.field.name.ko.js',
                  '/lako/cmf/assets/object.local.data.ko.js',
                  '/lako/cmf/assets/object.linked.object.ko.js',
                  '/lako/cmf/assets/object.create.ko.js',
                )
  );
}
