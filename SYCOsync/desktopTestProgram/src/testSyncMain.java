import SYCOserver.DebugFLAGS;
import TestRoutines.AdminTests;
import TestRoutines.CoachTests;
import TestRoutines.UserTests;
import TestRoutines.UserValidationTests;

public class testSyncMain {
	
	/*
	 * Classes containing test Commands
	 */
	public static UserValidationTests 	userValidationTests = new UserValidationTests();
	public static AdminTests 			adminTests			= new AdminTests();
	public static CoachTests			coachTests			= new CoachTests();
	public static UserTests				userTests			= new UserTests();
	
	/*
	 * Set debug flags.
	 * If debug flags are one, the application will send messages with allow
	 * Xdbug to work for the php side of things.
	 * 
	 * Right now switchws for debug are in
	 * 		RemoteConnection.parsePostParams()
	 */
	public static void debug_ON() {
		DebugFLAGS.PHP_DEBUG = DebugFLAGS.SERVER_DEBUG_FLAGS.DEBUG_ON;
	}
	
	public static void debug_OFF() {
		DebugFLAGS.PHP_DEBUG = DebugFLAGS.SERVER_DEBUG_FLAGS.DEBUG_OFF;
	}
		
	public static void main(String[] args) {
		debug_ON();				
		//debug_OFF();
		
		userValidationTests.testUserValidation();
		//AdminTests.testAdminGetAllData();
		//AdminTests.testAdminCreateUsers(3, 4, 6);
	}

}
