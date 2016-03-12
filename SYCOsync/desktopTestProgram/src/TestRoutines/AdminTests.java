package TestRoutines;

import Debugging.DebugFLAGS;
import SYCOServerAccess.AdminRemoteOperations;
import SYCOServerAccess.RemoteConnection;

/**
 * This class holds methods which run tests on particular Admin
 * capabilities.
 * 
 * @author David Johnson
 *
 */
public class AdminTests {
	
	/**
	 * Random value generator
	 */
	public static PuppyStuffer randGen = new PuppyStuffer();
	
	/**
	 * Allows connection to a remote location.
	 */
	public static AdminRemoteOperations adminRemoteOperations = new AdminRemoteOperations();
	
	
	/**
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
	public static void testAdminGetAllData() {
		System.out.println(RemoteConnection.doPostRequest(TestCommands.TestAdminSync.adminGetsAllSports));
		System.out.println(RemoteConnection.doPostRequest(TestCommands.TestAdminSync.adminGetsAllLeagues));
		System.out.println(RemoteConnection.doPostRequest(TestCommands.TestAdminSync.adminGetsAllUsers));
		System.out.println(RemoteConnection.doPostRequest(TestCommands.TestAdminSync.adminGetsAllTeams));
		System.out.println(RemoteConnection.doPostRequest(TestCommands.TestAdminSync.adminGetsAllEnrollment));
		System.out.println(RemoteConnection.doPostRequest(TestCommands.TestAdminSync.adminGetsAllPlaces));
		System.out.println(RemoteConnection.doPostRequest(TestCommands.TestAdminSync.adminGetsAllEvents));
	}
	
	/**
	 * This Method creates random admins, coaches, and users of
	 * given amount and then inserts them into the remote database.
	 * <br>
	 * @param numAdmin Number of admins you want to create.
	 * @param numCoach Number of coaches you want to create.
	 * @param numUser Number of users you want to create.
	 */
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
				
				if(DebugFLAGS.LOCAL_DEBUG == DebugFLAGS.LOCAL_DEBUG_FLAGS.DEBUG_ON) {
					System.out.printf("%-25s %-25s %-25s %-25s %-25s %-25s %-25s\n", fname, lname, phone, emergency, user_type, email, password);
				} else {
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
			
			for(;j < numCoach; j++) {
				//create some coaches
				fname = randGen.getRandomName();
				lname = randGen.getRandomName();
				phone = randGen.getRandomPhoneNumber();
				emergency = randGen.getRandomPhoneNumber();
				email = lname + "@baconSoft.net";
				user_type = "COACH";
				password = "PASSWORD";
				
				if(DebugFLAGS.LOCAL_DEBUG == DebugFLAGS.LOCAL_DEBUG_FLAGS.DEBUG_ON) {
					System.out.printf("%-25s %-25s %-25s %-25s %-25s %-25s %-25s\n", fname, lname, phone, emergency, user_type, email, password);
				} else {
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
			
			for(; k < numUser; k++) {
				//create some users
				fname = randGen.getRandomName();
				lname = randGen.getRandomName();
				phone = randGen.getRandomPhoneNumber();
				emergency = randGen.getRandomPhoneNumber();
				email = lname + "@baconSoft.net";
				user_type = "USER";
				password = "PASSWORD";
				
				if(DebugFLAGS.LOCAL_DEBUG == DebugFLAGS.LOCAL_DEBUG_FLAGS.DEBUG_ON) {
					System.out.printf("%-25s %-25s %-25s %-25s %-25s %-25s %-25s\n", fname, lname, phone, emergency, user_type, email, password);
				} else {
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
	
	/**
	 * This function creates a specified number of teams in
	 * the given league and attached to the given coach
	 * via their id.
	 * <br>
	 * @param league_id
	 * @param coach_id
	 * @param numberOfTeams
	 */
	public static void testAdminCreateTeams(int league_id, int coach_id, int numberOfTeams) {
		int i = 0;
		String team_name;
		
		for(;i < numberOfTeams; i++) {			
			team_name = randGen.getRandomTeamName();
			if(DebugFLAGS.LOCAL_DEBUG == DebugFLAGS.LOCAL_DEBUG_FLAGS.DEBUG_ON) {
				System.out.printf("%-25s %-25s %-25s\n", league_id, team_name, coach_id);
			} else {
				adminRemoteOperations.createTeam(String.valueOf(league_id), team_name, String.valueOf(coach_id));
			}
		}
	}
	
	/**
	 * Create an insert a league with a random name.
	 * @param leagueName
	 */
	public static void testAdminCreateLeagues(int numberOfLeagues) {
		int i = 0;
		String league_name;
		
		for(;i < numberOfLeagues; i++) {
			league_name = randGen.getRandomLeagueName();
			if(DebugFLAGS.LOCAL_DEBUG == DebugFLAGS.LOCAL_DEBUG_FLAGS.DEBUG_ON) {
				System.out.printf("%-25s \n", league_name);
			} else {
				adminRemoteOperations.createLeague(league_name, "1", "0", "100", "0000-00-00", "0000-00-00");
			}
		}
	}
	
	/**
	 * Create and insert a place with random attributes
	 * @param numberOfPlaces
	 */
	public static void testAdminCreatePlaces(int numberOfPlaces) {
		
	}
	
	
}
