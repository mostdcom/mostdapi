<?php

class Regional_model extends CI_Model {

## --- DESA/KELURAHAN ---
public function getListDesaByName($desa)
{
  $this->db->distinct();
  $this->db->select('d.id id_desa, d.name nama_desa, c.id id_kecamatan, c.name nama_kecamatan');
  $this->db->select('k.id id_kabkota, k.name nama_kabkota, p.id id_propinsi, p.nama nama_propinsi');
  $this->db->like('d.name', $desa);
  $this->db->join('regional_kecamatan c','c.id=d.district_id', 'left');
  $this->db->join('regional_kabkota k','k.id=c.regency_id', 'left');
  $this->db->join('regional_propinsi p','p.id=k.province_id', 'left');
  $query = $this->db->get('regional_desa d');
  return $query->result();
}

## --- KODE POS ---
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
