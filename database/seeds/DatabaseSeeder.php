<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//Model::unguard();

		 $this->call('ResourceTableSeeder');
		 $this->call('DepartmentTableSeeder');
		 $this->call('UserTableSeeder');		
		 $this->call('AccesslogTableSeeder');
		  $this->call('NoticeTableSeeder');
	}

}

class ResourceTableSeeder extends Seeder {
	public function run()
	{
		DB::table('resources')->insert([
			array('resName'=>'Loyaltysource.com','resDescription'=>'Loyalty Source’s diverse portfolio includes top-branded merchandise, gift cards, digital/mobile products and accessories, travel, and more. With industry best lead times, world-class brands, custom integration and a-la-carte shipping solutions, Loyalty Source has raised the bar in Canadian rewards program sourcing and fulfilment.'),
				array('resName'=>'Gameaccess.ca','resDescription'=>' An exclusively Canadian service that allows its subscribers to rent video games online and receive '),
				array('resName'=>'Engentive','resDescription'=>' New Resouce'),
			]);
	}

}

class DepartmentTableSeeder extends Seeder {
	public function run()
	{
		DB::table('departments')->insert([
			array('deptName'=>'Master','deptLocation'=>'642 DE COURCELLE ST SUITE 404 MONTREAL QC H4C 3C5','deptDescription'=>'Main office'),
			array('deptName'=>'IT','deptLocation'=>'120 St Catherine','deptDescription'=>'Computer Science'),
			array('deptName'=>'Accounting','deptLocation'=>'100 st jacque','deptDescription'=>'Financial')
			]);
	}

}

class UserTableSeeder extends Seeder {
	public function run()
	{
		DB::table('users')->insert([
			array('firstName'=>'Edie','lastName'=>'Abdor', 'email'=>'Edie.klf@gmail.com', 'password'=>Hash::make(1111),'gender'=>'male','title'=>'stage','designation'=>'new desination','joinDate'=>'2016-11-21','dateOfBirth'=>'1975-01-16','phoneNumber'=>514222444,'contactName'=>'EdieWife','contactPhone'=>'514123456','picture'=>'Edie.jpg','status'=>'active','level'=>1,'deptId'=>1),				
			array('firstName'=>'David','lastName'=>'Villa', 'email'=>'villa.klf@gmail.com', 'password'=>Hash::make(1111),'gender'=>'female','title'=>'Full Time','designation'=>'new desination','joinDate'=>'2010-10-15','dateOfBirth'=>'1975-01-12','phoneNumber'=>514222555,'contactName'=>'user1Wife','contactPhone'=>'514125555','picture'=>'villa.jpg','status'=>'active','level'=>1,'deptId'=>2),	
			array('firstName'=>'Lionel','lastName'=>'Messi', 'email'=>'messi.klf@gmail.com', 'password'=>Hash::make(1111),'gender'=>'male','title'=>'Full Time','designation'=>'new desination','joinDate'=>'2010-10-15','dateOfBirth'=>'1975-01-12','phoneNumber'=>514222555,'contactName'=>'user2Wife','contactPhone'=>'514125555','picture'=>'messi.jpg','status'=>'active','level'=>2,'deptId'=>1),
			array('firstName'=>'user3','lastName'=>'user3', 'email'=>'user3.klf@gmail.com', 'password'=>Hash::make(1111),'gender'=>'female','title'=>'Full Time','designation'=>'new desination','joinDate'=>'2010-10-15','dateOfBirth'=>'1975-01-12','phoneNumber'=>514222555,'contactName'=>'user3Wife','contactPhone'=>'514125555','picture'=>'admin.jpg','status'=>'active','level'=>2,'deptId'=>1),	
			array('firstName'=>'admin','lastName'=>'admin', 'email'=>'admin.klf@gmail.com', 'password'=>Hash::make(1111),'gender'=>'male','title'=>'Full Time','designation'=>'new desination','joinDate'=>'2010-10-15','dateOfBirth'=>'1975-01-12','phoneNumber'=>514222555,'contactName'=>'AdminWife','contactPhone'=>'514125555','picture'=>'admin.jpg','status'=>'active','level'=>2,'deptId'=>1),
			array('firstName'=>'Luis','lastName'=>'Andres', 'email'=>'luis.klf@gmail.com', 'password'=>Hash::make(1111),'gender'=>'male','title'=>'Stage','designation'=>'new desination','joinDate'=>'2016-12-20','dateOfBirth'=>'1974-01-12','phoneNumber'=>514222444,'contactName'=>'LuisWife','contactPhone'=>'514124444','picture'=>'luis.jpg','status'=>'active','level'=>1,'deptId'=>2),
			array('firstName'=>'Henry','lastName'=>'Thiare', 'email'=>'Henry.klf@gmail.com', 'password'=>Hash::make(1111),'gender'=>'male','title'=>'stage','designation'=>'new desination','joinDate'=>'2016-11-21','dateOfBirth'=>'1975-01-16','phoneNumber'=>514222444,'contactName'=>'HenryWife','contactPhone'=>'514123456','picture'=>'henry.jpg','status'=>'active','level'=>1,'deptId'=>2),				
			array('firstName'=>'David','lastName'=>'Beckham', 'email'=>'David.klf@gmail.com', 'password'=>Hash::make(1111),'gender'=>'male','title'=>'Full Time','designation'=>'new desination','joinDate'=>'2012-10-15','dateOfBirth'=>'1975-01-12','phoneNumber'=>5148888999,'contactName'=>'BeckhamWife','contactPhone'=>'514125555','picture'=>'beckham.jpg','status'=>'active','level'=>1,'deptId'=>3),
			array('firstName'=>'adminMd5','lastName'=>'admin', 'email'=>'adminmd5.klf@gmail.com', 'password'=>md5(1111),'gender'=>'male','title'=>'Full Time','designation'=>'new desination','joinDate'=>'2010-10-15','dateOfBirth'=>'1975-01-12','phoneNumber'=>514222555,'contactName'=>'AdminWife','contactPhone'=>'514125555','picture'=>'admin.jpg','status'=>'active','level'=>2,'deptId'=>1),	
			]);
	}

}


class AccesslogTableSeeder extends Seeder {
	public function run()
	{
		DB::table('accesslogs')->insert([
			array('resId'=>1,'userId'=>'2','requestDate'=>'2016-11-12','reason'=>'for seeing price of game for rent','accStatus'=>0),
			array('resId'=>2,'userId'=>'2','requestDate'=>'2016-1-2','reason'=>'Loyalty','accStatus'=>1),
			array('resId'=>1,'userId'=>'1','requestDate'=>'2016-10-2','reason'=>'request game','accStatus'=>2),
			array('resId'=>2,'userId'=>'2','requestDate'=>'2016-2-2','reason'=>'access loyalty','accStatus'=>1),
			array('resId'=>1,'userId'=>'1','requestDate'=>'2017-10-2','reason'=>'request new game','accStatus'=>2),
			array('resId'=>2,'userId'=>'2','requestDate'=>'2016-1-2','reason'=>'Loyalty','accStatus'=>1),
			array('resId'=>1,'userId'=>'1','requestDate'=>'2016-10-2','reason'=>'request game','accStatus'=>2),
			array('resId'=>1,'userId'=>'2','requestDate'=>'2017-11-12','reason'=>'for seeing price of game for rent','accStatus'=>0),
			array('resId'=>2,'userId'=>'2','requestDate'=>'2017-1-2','reason'=>'access Loyalty 2017','accStatus'=>1),
			array('resId'=>1,'userId'=>'1','requestDate'=>'2017-10-2','reason'=>'request game 2017','accStatus'=>2),
			array('resId'=>2,'userId'=>'2','requestDate'=>'2017-2-2','reason'=>'access loyalty 2017','accStatus'=>1),
			array('resId'=>1,'userId'=>'1','requestDate'=>'2017-1-2','reason'=>'request new game 2017','accStatus'=>2),
			array('resId'=>3,'userId'=>'2','requestDate'=>'2017-1-2','reason'=>'Loyalty 2017','accStatus'=>1),
			array('resId'=>3,'userId'=>'1','requestDate'=>'2017-10-2','reason'=>'request Engentive 2017','accStatus'=>2),
			array('resId'=>1,'userId'=>'2','requestDate'=>'2017-10-3','reason'=>'request game 2017','accStatus'=>2),
			array('resId'=>2,'userId'=>'2','requestDate'=>'2017-2-3','reason'=>'access loyalty 2017','accStatus'=>1),
			array('resId'=>1,'userId'=>'1','requestDate'=>'2017-1-4','reason'=>'request new game 2017','accStatus'=>2),
			array('resId'=>3,'userId'=>'2','requestDate'=>'2017-1-5','reason'=>'Engentive 2017','accStatus'=>1),
			array('resId'=>3,'userId'=>'1','requestDate'=>'2017-10-3','reason'=>'request Engentive 2017','accStatus'=>2),
			]);
	}
}

class NoticeTableSeeder extends Seeder {
	public function run()
	{
		DB::table('notices')->insert([
			array('notifyDate'=>'2017-1-10','expireDate'=>'2017-1-20','description'=>'We have conferrence in Main office','level'=>2),
			array('notifyDate'=>'2017-1-11','expireDate'=>'2017-1-20','description'=>'We must to discuss in IT deparment','level'=>1),
			array('notifyDate'=>'2017-1-12','expireDate'=>'2017-1-20','description'=>'Remember turn off computer before go home','level'=>1),
			]);
	}

}

