<?php namespace Inkwell\Flourish
{
	use fRecordSet;
use fProgrammerException;

	/**
	 *
	 */
	class Repository
	{
		const MODEL = NULL;

		static protected $order = [];


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
		public function findAll()
		{
			$model = static::MODEL;

			return fRecordSet::build($model, [], static::$order);
		}


		/**
		 *
		 */
		public function save($record)
		{
			$model = static::MODEL;

			if (!($record instanceof $model)) {
				throw new fProgrammerException(
					'Cannot save model of class %s via repository for %s',
					get_class($record),
					static::MODEL
				);
			}

			$record->store();
		}


		/**
		 *
		 */
		protected function prepare($record)
		{

		}
	}
}
