package TestRoutines;
import SYCOServerAccess.AdminRemoteOperations;
import SYCOServerAccess.RemoteConnection;

public class AdminTests {
	
	public PuppyStuffer randGen = new PuppyStuffer();
	public AdminRemoteOperations adminRemoteOperations = new AdminRemoteOperations();
	
	/*
	 * Sends the following commands to the server
	 * 	adminGetsAllSports
	 * 	adminGetsAllLeagues
	 * 	adminGetsAllUsers
	 * 	adminGetsAllTeams
	 * 	adminGetsAllEnrollment
	 * 	adminGetsAllPlaces
	 * 	adminGetsAllEvents
	 * 
	 * Should print a JSON formated string for each command to the console
	 */
	public void testAdminGetAllData() {
		System.out.println(RemoteConnection.doPostRequest(TestCommands.TestAdminSync.adminGetsAllSports));
		System.out.println(RemoteConnection.doPostRequest(TestCommands.TestAdminSync.adminGetsAllLeagues));
		System.out.println(RemoteConnection.doPostRequest(TestCommands.TestAdminSync.adminGetsAllUsers));
		System.out.println(RemoteConnection.doPostRequest(TestCommands.TestAdminSync.adminGetsAllTeams));
		System.out.println(RemoteConnection.doPostRequest(TestCommands.TestAdminSync.adminGetsAllEnrollment));
		System.out.println(RemoteConnection.doPostRequest(TestCommands.TestAdminSync.adminGetsAllPlaces));
		System.out.println(RemoteConnection.doPostRequest(TestCommands.TestAdminSync.adminGetsAllEvents));
	}
	
	public void testAdminCreateUsers(int numAdmin, int numCoach, int numUser) {
		
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
}
