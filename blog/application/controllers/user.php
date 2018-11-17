<?php

class User extends MY_Controller
{
	
	public function index()
	{
		// $this->load->helper('url');
		$this->load->model('article_model','article');
		$this->load->library('pagination');
		$config = [
					'base_url' => base_url('user/index'),
					'per_page' => 5,
					'total_rows' => $this->article->count_all_articles(),
					'full_tag_open' => '<ul class="pagination">',
					'full_tag_close' => '</ul>',
					'first_tag_open' => '<li>',
					'first_tag_close' => '</li>',
					'next_tag_open' => '<li>',
					'next_tag_close' => '</li>',
					'prev_tag_open' => '<li>',
					'prev_tag_close' => '</li>',
					'num_tag_open' => '<li>',
					'num_tag_close' => '</li>',
					'cur_tag_open' => '<li class="active"><a>',
					'cur_tag_close' => '</a></li>'
					];
		$this->pagination->initialize($config);
		$articles = $this->article->all_articles_list($config['per_page'],$this->uri->segment(3));
		$this->load->view('public/articles_list',compact('articles'));
	}

	public function search()
	{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('query','Query','required');
			if(!$this->form_validation->run())
				return $this->index();
			$query = $this->input->post('query');
			return redirect("user/search_result/$query");
	}

	public function search_result($query)
	{
		$this->load->model('article_model','article');
		$this->load->library('pagination');
		$config = [
					'base_url' => base_url("user/search_result/$query"),
					'per_page' => 5,
					'total_rows' => $this->article->count_search_result($query),
					'full_tag_open' => '<ul class="pagination">',
					'full_tag_close' => '</ul>',
					'first_tag_open' => '<li>',
					'first_tag_close' => '</li>',
					'uri_segment' => 4,
					'next_tag_open' => '<li>',
					'next_tag_close' => '</li>',
					'prev_tag_open' => '<li>',
					'prev_tag_close' => '</li>',
					'num_tag_open' => '<li>',
					'num_tag_close' => '</li>',
					'cur_tag_open' => '<li class="active"><a>',
					'cur_tag_close' => '</a></li>'
					];
		$this->pagination->initialize($config);
		$articles = $this->article->search($query,$config['per_page'],$this->uri->segment(4)) ;
		$this->load->view('public/search_result.php',compact('articles'));
		

	}

	public function article($id)
	{
		$this->load->model('article_model','article');
		$article = $this->article->find($id);
		$this->load->view('public/article_detail',compact('article'));
	}
}
?>