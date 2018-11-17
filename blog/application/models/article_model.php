<?php


class Article_model extends CI_Model
{
	public function articles_list($limit,$offset)
	{

		$user_id = $this->session->userdata('user_id');
		$articles = $this->db->select(['title','id'])
							// ->select('title')
							->from('articles')
							->where('user_id',$user_id)
							->limit($limit,$offset)
							->get();
							// print_r($articles->result());exit;
			return $articles->result();
	}

	public function all_articles_list($limit,$offset)
	{

		$articles = $this->db->select(['title','id','date'])
							// ->select('title')
							->from('articles')
							->limit($limit,$offset)
							->order_by('date','DESC')
							->get();
							// print_r($articles->result());exit;
			return $articles->result();
	}

	public function num_rows()
	{

		$user_id = $this->session->userdata('user_id');
		$articles = $this->db->select(['title','id'])
							->from('articles')
							->where('user_id',$user_id)
							->get();
			return $articles->num_rows();
	}

	public function count_all_articles()
	{

		$user_id = $this->session->userdata('user_id');
		$articles = $this->db->select(['title','id'])
							->from('articles')
							->get();
			return $articles->num_rows();
	}

	public function add_article($array)
	{
		return $this->db->insert('articles',$array);
	}

	public function find_article($article_id)
	{
		$q = $this->db->select(['id','title','body'])
						->where('id',$article_id)
						->get('articles');
		return $q->row();
	}

	public function update_article($article_id,Array $article)
	{
		$q = $this->db->update('articles',$article,['id'=>$article_id]);
		return $q;

	}

	public function delete_article($article_id)
	{
		$q = $this->db->delete('articles',['id'=>$article_id]);
		return $q;

	}

	public function search($query,$limit,$offset)
	{
		$q = $this->db->from('articles')
						->like('title',$query)
						->limit($limit,$offset)
						->get();
		return $q->result();

	}

	public function count_search_result($query)
	{
		$q = $this->db->from('articles')
						->like('title',$query)
						->get();
		return $q->num_rows();

	}

	public function find($id)
	{
		$q = $this->db->from('articles')
						->where(['id'=>$id])
						->get();
		if($q->num_rows())
		{
			return $q->row();	
		}
		else
		{
			return false;
		}

	}
	
}
?>