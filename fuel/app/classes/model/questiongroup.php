<?php

class Model_Questiongroup extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'group_name',
		'survey_id',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);
	protected static $_table_name = 'questiongroups';

	protected static $_has_many = array(
		'questions' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Question',
			'key_to' => 'questiongroup_id',
			'cascade_save' => true,
			'cascade_delete' => true,
			'conditions' => array(
				'order_by' => array(
					'order' => 'ASC',
				)
			),
		),
	);

	protected static $_belongs_to = array(
	    'survey' => array(
	        'key_from' => 'survey_id',
	        'model_to' => 'Model_Survey',
	        'key_to' => 'id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    ),
	);

        public function cloneQuestionGroup() {
                $new = new Model_QuestionGroup(array(
                        'survey_id' => $this->survey_id,
                        'group_name' => $this->group_name,
                ));

                $new->save();

                foreach($this->questions as $q) {
                        $newq = $q->cloneQuestion();
                        $newq->questiongroup_id = $new->id;
                        $new->questions[] = $newq;
                }

                $new->save();

                return $new;
        }

}
