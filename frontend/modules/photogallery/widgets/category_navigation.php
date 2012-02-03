<?php

/*
 * This file is part of the projects module.
 *
 * For the full copyright and license information, please view the license
 * file that was distributed with this source code.
 */
/**
 *
 * @author Frederik Heyninck <frederik@figure8.be>
 */
class FrontendPhotogalleryWidgetCategoryNavigation extends FrontendBaseWidget
{
	/**
	 * Execute the extra
	 *
	 * @return void
	 */
	public function execute()
	{
		// parent execute
		parent::execute();
		
		// data
		$this->getData();
		
		// load template
		$this->loadTemplate();
		
		// parse
		$this->parse();
	}

	/**
	 * Parse into template
	 *
	 * @return void
	 */
	private function getData()
	{	
		// Get categories and their projects
		$this->categories =  FrontendPhotogalleryModel::getAllCategories();
	}

	/**
	 * Parse into template
	 *
	 * @return void
	 */
	private function parse()
	{
		foreach($this->categories as &$category)
		{
			// Are we on a detail?
			if($this->URL->getParameter(0) == FL::getAction('Detail'))
			{
				$this->record = FrontendPhotogalleryModel::get($this->URL->getParameter(1));
				if(!empty($this->record))
				{
					$category['items'] = FrontendPhotogalleryModel::getAllForCategoryNavigation($category['url']);
					$category['selected'] = false;
					if(isset($this->record['category_id'])) $category['selected'] = (int) $category['id'] == (int) $this->record['category_id'] ? true : false;

					foreach($category['items'] as &$item)
					{
						if((int) $item['id'] == (int) $this->record['id'])
						{
							$item['selected'] = true;
							$category['selected'] = true;
						}
					}
				}
			}
			
			// Are we on a category detail?
			if($this->URL->getParameter(0) == FL::getAction('Category'))
			{
				$category['items'] = FrontendPhotogalleryModel::getAllForCategoryNavigation($category['url']);
				$category['selected'] = (string) $category['url'] ==  (string) $this->URL->getParameter(1) ? true : false;
			}
		}
		
		$this->tpl->assign('widgetPhotogalleryCategoryNavigation', $this->categories);
	}
}