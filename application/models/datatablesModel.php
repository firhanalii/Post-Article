<?php
class datatablesModel extends CI_Model{  
    var $table = 'posts';

    var $column_order_publish = array(null, 'id','title','category');
    var $column_search_publish = array('title','category');
    var $order_publish = array('create_date' => 'desc');

    var $column_order_draft = array(null, 'id','title','category');
    var $column_search_draft = array('title','category');
    var $order_draft = array('create_date' => 'desc');

    var $column_order_thrash = array(null, 'id','title','category');
    var $column_search_thrash = array('title','category');
    var $order_thrash = array('create_date' => 'desc');
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    private function _get_datatables_query()
    {
        $this->db->from($this->table);
        $this->db->where('status', 'Publish');
        
        $i = 0;
     
        foreach ($this->column_search_publish as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search_publish) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order_publish[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order_publish))
        {
            $order = $this->order_publish;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    private function _get_datatables_query_draft()
    {
        $this->db->from($this->table);
        $this->db->where('status', 'Draft');
        
        $i = 0;
     
        foreach ($this->column_search_draft as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search_draft) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order_draft[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order_draft))
        {
            $order = $this->order_draft;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables_draft()
    {
        $this->_get_datatables_query_draft();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered_draft()
    {
        $this->_get_datatables_query_draft();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all_draft()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    private function _get_datatables_query_thrash()
    {
        $this->db->from($this->table);
        $this->db->where('status', 'Thrash');
        
        $i = 0;
     
        foreach ($this->column_search_thrash as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search_thrash) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order_thrash[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order_thrash))
        {
            $order = $this->order_thrash;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables_thrash()
    {
        $this->_get_datatables_query_thrash();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered_thrash()
    {
        $this->_get_datatables_query_thrash();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all_thrash()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}
?>