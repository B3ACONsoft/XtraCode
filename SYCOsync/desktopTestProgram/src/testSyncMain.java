import java.util.HashMap;

public class testSyncMain {
	public static RemoteConnection testPosts = new RemoteConnection();
	public static AdminRemoteOperations adminRemoteOperations = new AdminRemoteOperations();
	public static PuppyStuffer randGen = new PuppyStuffer();
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
	
	
	public static void testAdminCreateUsers(int numAdmin, int numCoach, int numUser) {
		
		int i = 0;
		int j = 0;
		int k = 0;
		
		String fname;
		String lname;
		String phone;
		String emergency;
		String email;
		String user_type;
		String password;
		
		
			for(; i < numAdmin; i++) {
				//create some admins
				fname = randGen.getRandomName();
				lname = randGen.getRandomName();
				phone = randGen.getRandomPhoneNumber();
				emergency = randGen.getRandomPhoneNumber();
				email = lname + "@baconSoft.net";
				user_type = "ADMIN";
				password = "PASSWORD";
				System.out.printf("%-25s %-25s %-25s %-25s %-25s %-25s %-25s\n", fname, lname, phone, emergency, user_type, email, password);
				
				 adminRemoteOperations.createUser(
						fname,
						lname,
						phone,
						emergency,
						user_type,
						email,
						password);
				
			}
			
			for(;j < numCoach; j++) {
				//create some coaches
				fname = randGen.getRandomName();
				lname = randGen.getRandomName();
				phone = randGen.getRandomPhoneNumber();
				emergency = randGen.getRandomPhoneNumber();
				email = lname + "@baconSoft.net";
				user_type = "COACH";
				password = "PASSWORD";
				System.out.printf("%-25s %-25s %-25s %-25s %-25s %-25s %-25s\n", fname, lname, phone, emergency, user_type, email, password);
				
				 adminRemoteOperations.createUser(
						fname,
						lname,
						phone,
						emergency,
						user_type,
						email,
						password);
				 
			}
			
			for(; k < numUser; k++) {
				//create some users
				fname = randGen.getRandomName();
				lname = randGen.getRandomName();
				phone = randGen.getRandomPhoneNumber();
				emergency = randGen.getRandomPhoneNumber();
				email = lname + "@baconSoft.net";
				user_type = "USER";
				password = "PASSWORD";
				System.out.printf("%-25s %-25s %-25s %-25s %-25s %-25s %-25s\n", fname, lname, phone, emergency, user_type, email, password);
				adminRemoteOperations.createUser(
						fname,
						lname,
						phone,
						emergency,
						user_type,
						email,
						password);
			}
			
	
	}
	
	public static void main(String[] args) {
		testUserValidation();
		//testAdminGetAllData();
		//testAdminCreateUsers(3, 4, 6);
	}

}
