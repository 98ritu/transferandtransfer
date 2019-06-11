<?php
$config=[
  'form_rules'=>[
                   [
				     'field'=>'name',
					 'label'=>'User 2 Name',
					 'rules'=>'required|alpha_numeric_spaces'
				   ],
				   [
				   'field'=>'amount',
					 'label'=>'Credit points',
					 'rules'=>'required|numeric',
				   ]
				  ]
];				  