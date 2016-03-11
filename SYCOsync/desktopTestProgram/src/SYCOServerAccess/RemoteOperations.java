package SYCOServerAccess;
import java.io.IOException;
import java.net.InetAddress;
import java.net.UnknownHostException;
import java.sql.Timestamp;
import java.util.HashMap;

public abstract class RemoteOperations {
	
	protected RemoteConnection remoteConnection;
	protected HashMap<String, String> command;
	
	public RemoteOperations() {
		this.remoteConnection = new RemoteConnection();
		this.command = new HashMap<String, String>();
	}
	
	protected String doOperation() {
		return remoteConnection.doPostRequest(command);
	}
	
	
}
