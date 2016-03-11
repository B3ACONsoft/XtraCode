package TestRoutines;
import SYCOserver.RemoteConnection;

public class UserValidationTests {
	
	/*
	 * Run tests on user validation
	 * 		tests in suite are
	 * 			validAdminCreds
	 * 			noUserName
	 * 			noPassword
	 * 			validCoachCreds
	 * 			validUserCreds
	 * 
	 */
	public void testUserValidation() {
		System.out.println(RemoteConnection.doPostRequest(TestCommands.CheckUserValidation.validCredentials));
		System.out.println(RemoteConnection.doPostRequest(TestCommands.CheckUserValidation.noUserName));
		System.out.println(RemoteConnection.doPostRequest(TestCommands.CheckUserValidation.noPassword));
		System.out.println(RemoteConnection.doPostRequest(TestCommands.CheckUserValidation.validCoachCredentials));
		System.out.println(RemoteConnection.doPostRequest(TestCommands.CheckUserValidation.validUserCredentials));
	}
}
