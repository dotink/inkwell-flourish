<?php namespace Inkwell\Flourish
{
	/**
	 *
	 */
	class Repository
	{
		const MODEL = NULL;


		/**
		 * Create a new entity from the Repository
		 *
		 * @access public
		 * @return Object An instance of the model class for this repository
		 */
		public function create()
		{
			$model  = static::MODEL;
			$entity = new $model();

			$this->prepare($entity);

			return $entity;
		}


		/**
		 *
		 */
		public function find($key, $create_empty = FALSE)
		{
			$model = static::MODEL;

			try {
				return new $model($key);

			} catch (\fNotFoundException $e) {
				return $create_empty
					? $this->create()
					: NULL;
			}
		}


		/**
		 *
		 */
		public function save(Record $record)
		{
			$record->store();
		}


		/**
		 *
		 */
		protected function prepare(Record $entity)
		{

		}
	}
}
