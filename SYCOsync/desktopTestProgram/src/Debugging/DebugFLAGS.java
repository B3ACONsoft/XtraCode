package Debugging;

/*
 * These are debuggin flags for the application.
 */
public final class DebugFLAGS {
	public enum SERVER_DEBUG_FLAGS {
		DEBUG_ON,
		DEBUG_OFF
	}
	
	public enum LOCAL_DEBUG_FLAGS {
		DEBUG_ON,
		DEBUG_OFF
	}
	
	public static SERVER_DEBUG_FLAGS PHP_DEBUG;
	public static LOCAL_DEBUG_FLAGS LOCAL_DEBUG;
}
