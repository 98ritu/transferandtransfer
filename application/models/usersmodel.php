<?php
class Usersmodel extends CI_Model
{
	public function all_users_list($limit,$offset)
	{
		
		$query=$this->db
		                  ->select('Name')
						  ->select('ID')
						  ->select('Email')
						  ->select('Credits')
						  ->from('persons')
						  ->limit($limit,$offset)
                          ->get();
return $query->result();						  
						
		
	}
	public function find( $id )
{
$q=$this->db->from('persons')
		    ->where(['ID'=>$id])
			->get();
if($q->num_rows())
return $q->row();
else
return false;				
}
	public function find_id( $name)
{
$q=$this->db->from('persons')
		    ->where(['Name'=>$name])
			->select('ID')
			->get();
return $q->result_array();			
}
public function transfer($id,$id1,$amount)
{
	
	$credit1=$this->db->from('persons')
		    ->where(['ID'=>$id])
			->select('Credits')
			->get()->result_array()[0];
   $credit2=$this->db->from('persons')
		    ->where(['ID'=>$id1])
			->select('Credits')
			->get()->result_array()[0];
		if(!(($credit1['Credits']-$amount)<0))
		{
	$credit1['Credits']=$credit1['Credits']-$amount;
    $credit2['Credits']=$credit2['Credits']+$amount;	
		}	
	 $this->db->where('ID',$id)
		            ->update('persons',$credit1);
	return $this->db->where('ID',$id1)
		            ->update('persons',$credit2);
}
}