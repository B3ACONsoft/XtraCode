import java.util.HashMap;

public class testSyncMain {
	public static TestPosts testPosts = new TestPosts();
	
	/*
	 * I could use JUnit i guess..but hell...
	 */
	public static void testUserValidation() {
		System.out.println(testPosts.doPostRequest(TestCommands.CheckUserValidation.validCredentials));
		System.out.println(testPosts.doPostRequest(TestCommands.CheckUserValidation.noUserName));
		System.out.println(testPosts.doPostRequest(TestCommands.CheckUserValidation.noPassword));
		System.out.println(testPosts.doPostRequest(TestCommands.CheckUserValidation.validCoachCredentials));
		System.out.println(testPosts.doPostRequest(TestCommands.CheckUserValidation.validUserCredentials));
	}
	
	public static void testAdminGetAllData() {
		System.out.println(testPosts.doPostRequest(TestCommands.TestAdminSync.adminGetsAllSports));
		System.out.println(testPosts.doPostRequest(TestCommands.TestAdminSync.adminGetsAllLeagues));
		System.out.println(testPosts.doPostRequest(TestCommands.TestAdminSync.adminGetsAllUsers));
		System.out.println(testPosts.doPostRequest(TestCommands.TestAdminSync.adminGetsAllTeams));
		System.out.println(testPosts.doPostRequest(TestCommands.TestAdminSync.adminGetsAllEnrollment));
		System.out.println(testPosts.doPostRequest(TestCommands.TestAdminSync.adminGetsAllPlaces));
		System.out.println(testPosts.doPostRequest(TestCommands.TestAdminSync.adminGetsAllEvents));
	}
	
	public static void main(String[] args) {
		//testUserValidation();
		testAdminGetAllData();
		
	}

}
