<?php namespace App\Models;

use CodeIgniter\Model;

class UserPaymentModel extends Model
{
	protected $table      = 'app_user_payment';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'user_id', 'order_id', 'transaction_id', 'status_message', 'status_code',
        'redirect_url', 'gross_amount', 'payment_type', 'bank', 'transaction_time',
        'transaction_status', 'fraud_status', 'masked_card', 'card_type', 'finish_redirect_url'
    ];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function get_data($id = false)
    {
        if($id === false){
            return $this->table($this->table)
                ->get()
                ->getResultArray();
        } else {
            return $this->table($this->table)
                ->where('id', $id)
                ->get()
                ->getRowArray();
        }   
    }
    public function insert_data($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
    public function update_data($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }
    public function delete_data($id)
    {
        return $this->db->table($this->table)->delete(['id' => $id]);
    }
}