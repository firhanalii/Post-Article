<?php
class articleModel extends CI_Model{  
    public function get_article(){
        $this->db->select('title, content, category, status'); 
        $this->db->from('posts');
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_priview_content(){        
        $this->db->select('*'); 
        $this->db->from('posts');
        $this->db->where('status', 'Publish');
        $query=$this->db->get()->result_array();
        return $query;
    }

    public function getID_priview_content($id){        
        $this->db->select('*'); 
        $this->db->from('posts');
        $this->db->where('id', $id);
        $query=$this->db->get()->row();
        return $query;
    }

    public function count_post_publish(){        
        $this->db->select('status'); 
        $this->db->from('posts');
        $this->db->where('status', 'Publish');
        $query=$this->db->get()->num_rows();
        return $query;
    }

    public function count_post_draft(){        
        $this->db->select('status'); 
        $this->db->from('posts');
        $this->db->where('status', 'Draft');
        $query=$this->db->get()->num_rows();
        return $query;
    }

    public function count_post_thrash(){        
        $this->db->select('status'); 
        $this->db->from('posts');
        $this->db->where('status', 'Thrash');
        $query=$this->db->get()->num_rows();
        return $query;
    }

    public function add_post($data){
        return $this->db->insert('posts', $data);
    }

    public function get_post($id){        
        $this->db->select('title, content, category, status'); 
        $this->db->from('posts');
        $this->db->where('id', $id);
        $query=$this->db->get()->row();
        return $query;
    }

    public function update_post($id, $data){
        $this->db->where('id', $id);
        return $this->db->update('posts', $data);
    }
    
    public function delID_article($table,$where){        
        return $this->db->delete($table,$where);
    }
}
?>