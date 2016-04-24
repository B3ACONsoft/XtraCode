package TestRoutines;
import SYCOServerAccess.RemoteConnection;


/**
 * @author David Johnson
 *
 */
public class UserValidationTests {
	
	/**
	 * Run tests on user validation.
	 * Prints results to console.
	 * 		tests in suite are
	 * 			validAdminCreds
	 * 			noUserName
	 * 			noPassword
	 * 			validCoachCreds
	 * 			validUserCreds
	 */
	public void testUserValidation() {
		
		System.out.println(RemoteConnection.doPostRequest(TestCommands.CheckUserValidation.validCredentials));
		System.out.println(RemoteConnection.doPostRequest(TestCommands.CheckUserValidation.noUserName));
		System.out.println(RemoteConnection.doPostRequest(TestCommands.CheckUserValidation.noPassword));
		System.out.println(RemoteConnection.doPostRequest(TestCommands.CheckUserValidation.validCoachCredentials));
		System.out.println(RemoteConnection.doPostRequest(TestCommands.CheckUserValidation.validUserCredentials));
		
		//System.out.println(RemoteConnection.doPostRequest(TestCommands.CheckUserValidation.patrickCurrinCredentials));
		
	}
}
