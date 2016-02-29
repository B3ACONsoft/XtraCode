import java.io.IOException;
import java.net.InetAddress;
import java.net.UnknownHostException;
import java.sql.Timestamp;
import java.util.HashMap;
import org.apache.commons.net.ntp.NTPUDPClient;
import org.apache.commons.net.ntp.TimeInfo;

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
	
	protected String getCurrentTimestamp() throws IOException {
		String TIME_SERVER = "time-a.nist.gov";   
        NTPUDPClient timeClient = new NTPUDPClient();
        InetAddress inetAddress;
		inetAddress = InetAddress.getByName(TIME_SERVER);
		TimeInfo timeInfo = timeClient.getTime(inetAddress);
	    long returnTime = timeInfo.getReturnTime();
	    Timestamp timeStamp = new Timestamp(returnTime);
	        //System.out.println("Time from " + TIME_SERVER + ": " + timeStamp.toString());
	    return timeStamp.toString();
	}
}
