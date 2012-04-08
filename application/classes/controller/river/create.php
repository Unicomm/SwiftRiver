<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * Create River Controller
 *
 * PHP version 5
 * LICENSE: This source file is subject to GPLv3 license 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/copyleft/gpl.html
 * @author	   Ushahidi Team <team@ushahidi.com> 
 * @package	   SwiftRiver - http://github.com/ushahidi/Swiftriver_v2
 * @subpackage Controllers
 * @copyright  Ushahidi - http://www.ushahidi.com
 * @license	   http://www.gnu.org/copyleft/gpl.html GNU General Public License v3 (GPLv3) 
 */
class Controller_River_Create extends Controller_River {
	
	/**
	 * Which step in the river creation process?
	 * @var step
	 */
	protected $step = 'name';
	
	/**
	 * Account Owner
	 * @var string
	 */
	protected $account_path = NULL;

	/**
	 * This steps content/form
	 * @var string
	 */
	protected $step_content = NULL;

	/**
	 * @return	void
	 */
	public function before()
	{
		// Execute parent::before first
		parent::before();

		// Only account owners are alllowed here
		if ( ! $this->account->is_owner($this->visited_account->user->id) OR $this->anonymous)
		{
			throw new HTTP_Exception_403();
		}

		// The main create template
		$this->template->content = View::factory('pages/river/create')
			->bind('account_path', $this->account_path)
			->bind('step', $this->step)
			->bind('step_content', $this->step_content);

		// Account Path
		$this->account_path = $this->user->account->account_path;
	}

	/**
	 * Create a New River
	 * Step 1
	 * @return	void
	 */
	public function action_index()
	{
		$this->step_content = View::factory('pages/river/create/name')
			->bind('post', $post)
			->bind('errors', $errors);

		// Check for form submission
		if ($_POST AND CSRF::valid($_POST['form_auth_id']))
		{

			$post = Arr::extract($_POST, array('river_name', 'river_public'));
			try
			{
				$river = Model_River::create_new($post['river_name'], $post['river_public'], $this->user->account);

				// Redirect to the /create/open/<id> to open channels
				$this->request->redirect(URL::site().$this->account_path.'/river/create/open/'.$river->id);
			}
			catch (ORM_Validation_Exception $e)
			{
				$errors = $e->errors('validation');
			}
			catch (Database_Exception $e)
			{
				$errors = array(__("A river with the name ':name' already exists", 
					array(':name' => $post['river_name'])
				));
			}
		}		
	}

	/**
	 * Create a New River
	 * Step 2 - Open Channels
	 * @return	void
	 */
	public function action_open()
	{
		$this->step_content = View::factory('pages/river/settings/channels');
		$this->step = 'open';

		// This River
		$id = $this->request->param('id', 0);
		
	}

	/**
	 * Create a New River
	 * Step 3 - View the River
	 * @return	void
	 */
	public function action_view()
	{
		$this->step_content = View::factory('pages/river/create/view');
		$this->step = 'view';
	}	
}