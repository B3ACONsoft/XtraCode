package SYCOServerAccess;


import dbobjects.Attendance;
import dbobjects.Enrollment;
import dbobjects.Event;
import dbobjects.League;
import dbobjects.Place;
import dbobjects.Player;
import dbobjects.Sport;
import dbobjects.Team;
import dbobjects.Users;

public class UpdateOperations extends RemoteOperations {

    public UpdateOperations(RemoteConnection remoteConnection) {
        super(remoteConnection);
    }

    public int updatePOJO(Object pojo) {
        POJO_TYPE pojo_type = getPOJOtype(pojo);
        switch(pojo_type){
            case ATTENDANCE:
                Attendance attendanceRecord = (Attendance)pojo;
                //TODO implement update attendance
                break;
            case ENROLLMENT:
                Enrollment enrollmentRecord = (Enrollment)pojo;
                //TODO implement update enrollment
                break;
            case EVENT:
                Event eventRecord = (Event)pojo;
                //TODO implement update event
                break;
            case LEAGUE:
                League leagueRecord = (League)pojo;
                //TODO implement update league
                break;
            case PLACE:
                Place placeRecord = (Place)pojo;
                //TODO implement update place
                break;
            case PLAYER:
                Player playerRecord = (Player)pojo;
                //TODO implement update player
                break;
            case SPORT:
                Sport sportRecord = (Sport)pojo;
                //TODO implement update sport
                break;
            case TEAM:
                Team teamRecord = (Team)pojo;
                //TODO implement update team
                break;
            case USERS:
                Users userRecord = (Users)pojo;
                //TODO implement update user
                break;
        }
        return 0;
    }
}
