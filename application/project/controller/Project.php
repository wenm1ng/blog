<?php 
	namespace app\project\controller;

	use \base\Base_1;
	use think\Db;
	use think\Controller;
	use think\Session;
	use think\Request;
	use \base\Baseapi;

	class Project extends Baseapi
	{
		public $username ;
		public $userid;

		public function __construct(){
			// parent::__construct();
			// $this->username = session::get('username');
			// $this->uid = session::get('uid');

		}

		//文章首页
		public function populars(){
			return json(['data'=>[],'code'=>200,'message'=>'操作完成']);
		}


		public function addinfo(){
			if(Request::instance()->isPost()){
				$data = input();
				$data['create_userid'] 		= $this->uid;
				$data['create_username'] 	= $this->username;
				$data['create_time'] 		= date('Y-m-d H:i:s');
				$data['img']				= input('img/a')[0];
				// print_r($data);exit;
				if(Db::name('article')->insert($data)){
					$this->success('添加成功','index');
				}else{
					$this->error('添加失败');
				}
			}else{
				return view('addinfo',['meta_title'=>'新增文章']);
			}
		}

		public function delinfo(){
			if(Request::instance()->isPost()){
				//多选删除
				$ids = explode(',', trim(input('ids'),','));
				$map['article_id'] = array('in' , $ids); 
			}else{
				//单删除
				$map['article_id'] = input('id');
			}

			if(Db::name('article')->where($map)->delete()){
				$this->success('删除成功');
			}else{
				log_error('fail_sql'.date('Y-m-d'), Db::getlastsql());
				$this->error('删除失败');
			}
		}

		public function editinfo(){
			if(Request::instance()->isPost()){
				header("Content-type: text/html; charset=utf-8");
				$data = input();
				$data['img'] = input('img/a')[0];
				$data['update_time'] = date('Y-m-d H:i:s');
				$id = $data['article_id'];
				unset($data['article_id']);

				if(Db::name('article')->where("article_id = '{$id}'")->update($data)){
					$this->success('修改成功','index');
				}else{
					$this->error('修改失败');
				}
			}else{
				$id = htmlspecialchars(trim(input('id')));
				$info = Db::query("select * from blog_article where article_id = ?",[$id]);
				return view('editinfo',['meta_title'=>'修改文章','info'=>$info[0]?:array()]);
			}
		}
	}
?>