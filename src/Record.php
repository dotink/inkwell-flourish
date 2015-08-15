<?php namespace Inkwell\Flourish
{
	use fActiveRecord;

	/**
	 *
	 */
	class Record extends fActiveRecord
	{
		/**
		 *
		 */
		protected $whitelist = array();


		/**
		 *
		 */
		public function fill($data)
		{
			foreach ($data as $property => $value) {
				if (!count($this->whitelist) || in_array($property, $this->$whitelist)) {
					$this->{'set' . $property}($value);
				}
			}
		}


		/**
		 *
		 */
		public function whitelist(...$properties)
		{
			$this->whitelist = array_merge($this->whitelist, $properties);
		}
	}
}
