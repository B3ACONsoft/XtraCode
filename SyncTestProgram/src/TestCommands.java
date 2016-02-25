import java.util.HashMap;

public final class TestCommands {
	public static final class CheckUserValidation {
		public static final HashMap<String, String> validCredentials;
		static {
			validCredentials = new HashMap<String, String>(); 
			{
				validCredentials.put("user_id", "1");
				validCredentials.put("password", "PASSWORD");
			}
		};
		
		public static final HashMap<String, String> noUserName;
		static {
			noUserName = new HashMap<String, String>(); 
			{
				noUserName.put("password", "PASSWORD");
			}
		};
		
		public static final HashMap<String, String> noPassword;
		static {
			noPassword = new HashMap<String, String>(); 
			{
				noPassword.put("user_id", "1");
			}
		};
		
		public static final HashMap<String, String> validAdminCredentials;
		static {
			validAdminCredentials = new HashMap<String, String>(); 
			{
				validAdminCredentials.put("user_id", "1");
				validAdminCredentials.put("password", "PASSWORD");
			}
		};
		
		public static final HashMap<String, String> validCoachCredentials;
		static {
			validCoachCredentials = new HashMap<String, String>(); 
			{
				validCoachCredentials.put("user_id", "4");
				validCoachCredentials.put("password", "PASSWORD");
			}
		};
		
		public static final HashMap<String, String> validUserCredentials;
		static {
			validUserCredentials = new HashMap<String, String>(); 
			{
				validUserCredentials.put("user_id", "3");
				validUserCredentials.put("password", "PASSWORD");
			}
		};
		
	}
	
	public static final class TestAdminSync {
		
		public static final HashMap<String, String> adminGetsAllSports;
		static {
			adminGetsAllSports = new HashMap<String, String>(); 
			{
				adminGetsAllSports.put("user_id", "1");
				adminGetsAllSports.put("password", "PASSWORD");
				adminGetsAllSports.put("command", "SELECT");
				adminGetsAllSports.put("table", "SPORTS");
			}
		};
		
		public static final HashMap<String, String> adminGetsAllLeagues;
		static {
			adminGetsAllLeagues = new HashMap<String, String>(); 
			{
				adminGetsAllLeagues.put("user_id", "1");
				adminGetsAllLeagues.put("password", "PASSWORD");
				adminGetsAllLeagues.put("command", "SELECT");
				adminGetsAllLeagues.put("table", "LEAGUE");
			}
		};
		
		public static final HashMap<String, String> adminGetsAllUsers;
		static {
			adminGetsAllUsers = new HashMap<String, String>(); 
			{
				adminGetsAllUsers.put("user_id", "1");
				adminGetsAllUsers.put("password", "PASSWORD");
				adminGetsAllUsers.put("command", "SELECT");
				adminGetsAllUsers.put("table", "USERS");
			}
		};
		
		
		public static final HashMap<String, String> adminGetsAllTeams;
		static {
			adminGetsAllTeams = new HashMap<String, String>(); 
			{
				adminGetsAllTeams.put("user_id", "1");
				adminGetsAllTeams.put("password", "PASSWORD");
				adminGetsAllTeams.put("command", "SELECT");
				adminGetsAllTeams.put("table", "TEAM");
			}
		};
		
		public static final HashMap<String, String> adminGetsAllEnrollment;
		static {
			adminGetsAllEnrollment = new HashMap<String, String>(); 
			{
				adminGetsAllEnrollment.put("user_id", "1");
				adminGetsAllEnrollment.put("password", "PASSWORD");
				adminGetsAllEnrollment.put("command", "SELECT");
				adminGetsAllEnrollment.put("table", "ENROLLMENT");
			}
		};
		
		public static final HashMap<String, String> adminGetsAllPlaces;
		static {
			adminGetsAllPlaces = new HashMap<String, String>(); 
			{
				adminGetsAllPlaces.put("user_id", "1");
				adminGetsAllPlaces.put("password", "PASSWORD");
				adminGetsAllPlaces.put("command", "SELECT");
				adminGetsAllPlaces.put("table", "PLACE");
			}
		};
		
		public static final HashMap<String, String> adminGetsAllEvents;
		static {
			adminGetsAllEvents = new HashMap<String, String>(); 
			{
				adminGetsAllEvents.put("user_id", "1");
				adminGetsAllEvents.put("password", "PASSWORD");
				adminGetsAllEvents.put("command", "SELECT");
				adminGetsAllEvents.put("table", "EVENTS");
			}
		};
	}
}
