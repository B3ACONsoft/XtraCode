import Debugging.DebugFLAGS;
import TestRoutines.AdminTests;
import TestRoutines.CoachTests;
import TestRoutines.PuppyStuffer;
import TestRoutines.UserTests;
import TestRoutines.UserValidationTests;

/**
 * @author David Johnson
 *	This is the entry point of the testProgram.
 *	Test routines are staged in main.
 *	<br>
 *	Use debug toggle routines int main to set debugging options.
 */
public class testSyncMain {
	
	
	public static UserValidationTests 	userValidationTests = new UserValidationTests();
	public static AdminTests 			adminTests			= new AdminTests();
	public static CoachTests			coachTests			= new CoachTests();
	public static UserTests				userTests			= new UserTests();
	
	/**
	 * Set PHP debugging ON
	 */
	public static void debugPHP_ON() {
		DebugFLAGS.PHP_DEBUG = DebugFLAGS.SERVER_DEBUG_FLAGS.DEBUG_ON;
	}
	
	/**
	 * Set PHP debugging OFF
	 */
	public static void debugPHP_OFF() {
		DebugFLAGS.PHP_DEBUG = DebugFLAGS.SERVER_DEBUG_FLAGS.DEBUG_OFF;
	}
	
	/**
	 * Set Local Debugging ON
	 */
	public static void debugLocal_ON() {
		DebugFLAGS.LOCAL_DEBUG = DebugFLAGS.LOCAL_DEBUG_FLAGS.DEBUG_ON;
	}
	
	/**
	 * Set Local debugging OFF
	 */
	public static void debugLocal_OFF() {
		DebugFLAGS.LOCAL_DEBUG = DebugFLAGS.LOCAL_DEBUG_FLAGS.DEBUG_OFF;
	}
	
	public static void main(String[] args) {
		//debugPHP_ON();				
		debugPHP_OFF();
		//debugLocal_ON();
		debugLocal_OFF();
		
		//userValidationTests.testUserValidation();
		AdminTests.testAdminGetAllData();
		//AdminTests.testAdminCreateUsers(3, 4, 6);
		//AdminTests.testAdminCreateTeams(1, 15, 15);
		//AdminTests.testAdminCreateLeagues(10);
		/*
		PuppyStuffer stuffer = new PuppyStuffer();
<<<<<<< HEAD
		for(int i = 0; i < 100; i++) {
			
		}
		*/
=======
		//for(int i = 0; i < 25; i++) {
		//	System.out.println(stuffer.getRandomSportName());
		//stuffer.getJSONArray()
		//}
		stuffer.doFullPuppyStuff();
>>>>>>> 6b55ade68e5d19c3ad332fbaf8465a69a9819e01
	}

}
