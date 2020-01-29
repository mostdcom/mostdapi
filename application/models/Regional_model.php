<?php

class Regional_model extends CI_Model {

  public function getKodePosByDesa($desa)
  {
    $this->db->distinct();
    $this->db->like('kelurahan', $desa);
    $query = $this->db->get('regional_kodepos');
    return $query->result();
  }

  public function getKodePosByIdDesa($id_desa)
  {
    $this->db->distinct();
    $this->db->where('id_desa', $id_desa);
    $query = $this->db->get('regional_kodepos');
    return $query->result();
  }

}


?>
